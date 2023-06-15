<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Comment;
use App\Models\About;
use App\Models\Setting;
use App\Models\Portfolio;
use App\Contracts\BlogContract;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;

class BlogsController extends Controller
{

    /**
     * @var BlogContract
     */
    protected $blogRepository, $categoriesRepository;

    /**
     * BlogController constructor.
     * @param BlogContract $blogRepository
     */
    public function __construct(BlogContract $blogRepository, CategoryContract $categoriesRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoriesRepository = $categoriesRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('status','=', '1')->paginate(9);
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $about = About::where('status','=' ,'1')->first();
        $setting = Setting::first();
        return view('frontend.blog', compact('blogs','setting', 'about' , 'footerprojects'));
    }


    public function blogByCategory($cid)
    {
        $blogs = Blog::where('category_id','=', $cid)->paginate(9);
        if(count($blogs)<1){
            return view('frontend.404');
        }
        $setting = Setting::first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $about = About::where('status','=' ,'1')->first();

        return view('frontend.blog', compact('blogs','setting' , 'about' , 'footerprojects'));
    }

    public function show($bid)
    {

        $blog = Blog::where('id', $bid)->firstOrFail();

        if(empty($blog)){
            return view('frontend.404');
        }
        $setting = Setting::first();
        $footerprojects = Portfolio::where('status','=' ,'1')->latest()->limit(6)->get();
        $blogs = Blog::where('status','=' , '1')->latest()->limit('5')->get();
        $about = About::where('status','=' ,'1')->first();
        $blogcategories = Blog::where('status','=' , '1')->groupBy('category_id')
        ->selectRaw('count(*) as total, category_id')
        ->get();
        // dd($blogcategories->category);
        // $blogcategories = Blog::where('status','=' , '1')->groupBy('blogs.category_id')->get();
        return view('frontend.blogdetails', compact('blogs','setting','blog', 'about' ,'blogcategories' , 'footerprojects'));
    }

}
