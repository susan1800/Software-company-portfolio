<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\CompanyIcon;
use App\Models\CompanyFact;
use App\Models\About;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Screen;
use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public  function index(){
        $setting = Setting::first();
        $services = Service::where('status','=' ,'1')->get();
        $portfolios = Portfolio::where('status','=' ,'1')->latest()->limit(12)->get();
        $categories = Category::where('status','=' ,'1')->get();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $about = About::where('status','=' ,'1')->first();
        return view('frontend.service', compact(['services','setting' , 'about' , 'footerprojects' , 'portfolios' , 'categories']));
    }
}
