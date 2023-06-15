<?php

namespace App\Http\Controllers\Admin;
use App\Models\About;
use App\Contracts\AboutContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Validator;

class AboutController extends BaseController
{
    /**
     * @var AboutContract
     */
    protected $aboutRepository;

    /**
     * AboutController constructor.
     * @param AboutContract $aboutRepository
     */
    public function __construct(AboutContract $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $targetAbout = About::first();


        $this->setPageTitle('About Us', 'About Us');
        return view('admin.abouts.index', compact('targetAbout'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $abouts = $this->aboutRepository->listAbout('id', 'asc');

        $this->setPageTitle('About Us', 'Update About');
        return view('admin.abouts.create', compact('abouts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required',
            'details' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png',
            'subtitle'  =>  'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'github' => 'required',
            'status'  =>  'required',
            'map'  =>  'required',
        ]);

        $params = $request->except('_token');

        $about = $this->aboutRepository->createAbout($params);

        if (!$about) {
            return $this->responseRedirectBack('Error occurred while creating about.', 'error', true, true);
        }
        return $this->responseRedirect('admin.abouts.index', 'about added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetAbout = $this->aboutRepository->findAboutById($id);
        $abouts = $this->aboutRepository->listAbout();

        $this->setPageTitle('About Us', 'Edit About : '.$targetAbout->name);
        return view('admin.abouts.edit', compact('abouts', 'targetAbout'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'      =>  'required|max:191',
            'details' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png',
            'phone'  =>  'required',
            'email'  =>  'required',
            'location'  =>  'required',
            'map'  =>  'required',
        ]);
        if($validator->fails()){
            return $this->responseRedirectBack('Validation Error.', $validator->errors(), true, true);

        }
        $params = $request->except('_token');

        $about = $this->aboutRepository->updateAbout($params);

        if (!$about) {
            return $this->responseRedirectBack('Error occurred while updating about.', 'error', true, true);
        }
        return $this->responseRedirectBack('About updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $about = $this->aboutRepository->deleteAbout($id);

        if (!$about) {
            return $this->responseRedirectBack('Error occurred while update about.', 'error', true, true);
        }
        return $this->responseRedirect('admin.abouts.index', 'About updated successfully' ,'success',false, false);
    }

}
