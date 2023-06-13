<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\About;
use App\Models\Setting;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public  function index(){
        $setting = Setting::first();
        $testimonials = Testimonial::where('status','=' ,'1')->get();
        $about = About::where('status','=' ,'1')->first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();


        return view('frontend.testimonial', compact(['testimonials','setting' , 'about' , 'footerprojects']));
    }
}
