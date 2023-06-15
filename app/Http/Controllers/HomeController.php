<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Subscription;
use App\Models\CompanyIcon;
use App\Models\CompanyFact;
use App\Models\About;
use App\Models\Home;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Screen;
use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index(){
        $services = Service::where('status','=' ,'1')->get();
        $setting = Setting::first();
        $categories = Category::where('cat','project')->where('status','=' ,'1')->get();
        $blogs = Blog::where('status','=' ,'1')->get();
        $portfolios = Portfolio::where('status','=' ,'1')->latest()->limit(10)->get();
        $teams = Team::where('status','=' ,'1')->get();
        $about = About::where('status','=' ,'1')->first();
        $testimonials =Testimonial::where('status','=' ,'1')->get();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();

        $companyicons =CompanyIcon::where('status','=' ,'1')->get();
        $companyiconcount =CompanyIcon::where('status','=','1')->count();
        $companyfacts =CompanyFact::where('status','=' ,'1')->get();

        $home=Home::where('status','=' ,'1')->latest()->first();



        return view('frontend.index', compact(['companyiconcount','companyfacts', 'companyicons','services','teams', 'blogs' , 'testimonials' , 'about','home' , 'portfolios' , 'categories' , 'footerprojects','setting']));
    }
}
