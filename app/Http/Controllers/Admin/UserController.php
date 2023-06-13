<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use mail;
use json;
use Carbon\Carbon;
class UserController extends BaseController
{
    /**
     * @var UserContract
     */
    protected $UserRepository;

    /**
     * UserController constructor.
     * @param UserContract $UserRepository
     */
    public function __construct(UserContract $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->UserRepository->listUser();
 
        $this->setPageTitle('Users', 'List of all user');
        return view('admin.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = $this->UserRepository->listUser('id', 'asc');

        $this->setPageTitle('Users', 'Create User');
        return view('admin.user.create', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'email' =>  'required|email',
            'password' =>  'required',
            'status'     =>  'required',
        ]);

        $params = $request->except('_token');

        $User = $this->UserRepository->createUser($params);

        if (!$User) {
            return $this->responseRedirectBack('Error occurred while creating User.', 'error', true, true);
        }
        return $this->verification($request->email);
        // return $this->responseRedirect('signin', 'User added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetuser = $this->UserRepository->findUserById($id);
        $user = $this->UserRepository->listUser();

        $this->setPageTitle('Users', 'Edit User : '.$targetuser->name);
        return view('admin.user.edit', compact('user', 'targetuser'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'email' =>  'required|email',
            'password' =>  'required',
        ]);

        $params = $request->except('_token');

        $User = $this->UserRepository->updateUser($params);

        if (!$User) {
            return $this->responseRedirectBack('Error occurred while updating User.', 'error', true, true);
        }
        return $this->responseRedirectBack('User updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $User = $this->UserRepository->deleteUser($id);

        if (!$User) {
            return $this->responseRedirectBack('Error occurred while deleting User.', 'error', true, true);
        }
        return $this->responseRedirect('admin.user.index', 'User deleted successfully' ,'success',false, false);
    }




    public function signin(){
        // $data['message']='';
        return view('frontend.signin',['message'=>'','error'=>'']);
    }






    public function login(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
            'password' =>  'required',

        ]);
        $user=  $this->UserRepository->findUserByEmail($request['email']);
        if($user == '[]'){
            return $this->responseRedirectBack('User not found.', 'error', true, true);
        }
      
      if($user['0']['email_verified_at'] == null)
      {
       return $this->verification($request->email);
      }
       echo $user['0']['password'];
       echo "<br>";
        if(Hash::check($request['password'], $user['0']['password'])){
            
            return $this->responseRedirect('home', 'Login successfully' ,'success',false, false);
        }
        else{
            return $this->responseRedirectBack('Wrong password.', 'error', true, true);
        }

    }

    function verification($email){
        
        $otp=mt_rand(0, 999999);
        $details = [
            'title' => 'Localhost',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        
        \Mail::to($email)->send(new \App\Mail\otp($details));
        
        return view('mail.checkotp',['otp' => $otp , 'email'=> $email]);
    }

    public function verifyotp(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
        ]);
        $user=  $this->UserRepository->findUserByEmail($request['email']);
        $params['id']=$user['0']['id'];
        $params['email_verified_at']= Carbon::now()->timestamp;
       
        $result = $this->UserRepository->updateUser($params);
        if($result){
        return $this->responseRedirect('signin', 'verified successfully' ,'success',false, false);
        }
    }

    function verifyemail(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
        ]);
        $user=  $this->UserRepository->findUserByEmail($request['email']);
        if($user=='[]'){
            return $this->responseRedirect('signin', 'Email not register yet' ,'failed',false, false); 
        }
        $otp=mt_rand(0, 999999);
        $details = [
            'title' => 'Localhost',
            'body' => "your otp-code is",
            'head'=>$otp
        ];
        
        \Mail::to($request->email)->send(new \App\Mail\otp($details));
        
        return view('mail.passwordcheckotp',['otp' => $otp , 'email'=> $request->email]);
    }
    public function verifypasswordotp(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
        ]);
        return view('frontend.forgotpasswordchange',['email'=> $request->email]);
        
    }
   
    public function updateforgotpassword(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
            'newpassword' =>  'required',
            'conformpassword' =>  'required',
        ]); 
        // exit();
        $user=  $this->UserRepository->findUserByEmail($request['email']);
        $params['id']=$user['0']['id'];
        
        $params = $request->except('_token');
        $params['id']=$user['0']['id'];
        $User = $this->UserRepository->updateUser($params);

        return $this->responseRedirect('signin', 'verified successfully' ,'success',false, false);
    
    }
}
