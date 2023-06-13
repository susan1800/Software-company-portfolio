<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Contracts\ContactContract;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Setting;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactContract $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display a listing of the resource
     */

    public function index()
    {
        $setting = Setting::first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $about =About::where('status','=' ,'1')->first();
        return view('frontend.contact', compact(['about','setting' , 'footerprojects']));

    }

}
