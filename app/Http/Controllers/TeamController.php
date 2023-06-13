<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Contact;
use App\Models\About;
use App\Models\Setting;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public  function index(){

        $teams = Team::where('status','=' ,'1')->get();
        $setting = Setting::first();
        $about = About::where('status','=' ,'1')->first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();


        return view('frontend.team', compact(['teams','setting', 'about', 'footerprojects']));
    }
}
