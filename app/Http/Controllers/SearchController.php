<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Blog;
use App\Models\Setting;
class SearchController extends Controller
{
    public function search()
    {


        $query = $_GET['search'];
        $setting = Setting::first();
        $projects = Portfolio::where('status' , 1)->where('title', 'like', '%' . $query . '%')->limit(12)->paginate(3);

        $blogs = Blog::where('status' , 1)->where('title', 'like', '%' . $query . '%')->limit(12)->paginate(3);

          if (sizeof($projects) > 0 || sizeof($blogs) > 0) {
            return view('frontend.partials.search', compact('blogs','setting', 'projects' , 'query'));
        }
        else{
            return "No search result found !";
        }

    }
}
