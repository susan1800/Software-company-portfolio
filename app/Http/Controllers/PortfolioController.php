<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\About;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Project;
use App\Models\Setting;
use App\Contracts\PortfolioContract;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    /**
     * @var PortfolioContract
     */
    protected $portfolioRepository, $categoriesRepository;

    /**
     * PortfolioController constructor.
     * @param PortfolioContract $portfolioRepository
     */
    public function __construct(PortfolioContract $portfolioRepository, CategoryContract $categoriesRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->categoriesRepository = $categoriesRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $portfolios = Portfolio::where('status','=' ,'1')->get();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $about = About::where('status','=' ,'1')->first();
        $categories =  Category::where('status','=' , '1')->get();

        return view('frontend.project', compact('portfolios', 'setting' , 'about' ,  'categories' , 'footerprojects'));
    }

    // public function show($bid)
    // {
    //     $portfolio = POrtfolio::where('id', $bid)->firstOrFail();
    //     $abouts = About::first();
    //     return view('frontend.portfoliosingle', compact('blog','abouts'));
    // }

}
