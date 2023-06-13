<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Validator;
use Illuminate\Http\Request;
use Mail;
class MailController extends BaseController
{
    public function message(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);




        $details = [
            'title' => $request['subject'],
            'body' => $request['message'],
            'from' => $request['email'],
            'name' =>$request['name'],
        ];



        $result = \Mail::to('timalsinasusan14@gmail.com')->send(new \App\Mail\Contact($details));
        // if($result){
        return true;
        // }
        // else{
            return false;
        // }


    }
}
