<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\CompanyFact;
use App\Models\CompanyIcon;
use App\Contracts\AboutContract;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    protected $aboutRepository;

    public function __construct(AboutContract $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function index()
    {
        $setting = Setting::first();
        $about = About::where('status','=' ,'1')->first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $services = Service::where('status','=' ,'1')->get();
        $testimonials = Testimonial::where('status','=' ,'1')->get();
        $teams = Team::where('status','=' ,'1')->get();
        return view('frontend.about', compact('about','setting','services','testimonials' , 'teams' , 'footerprojects'));
    }
}
