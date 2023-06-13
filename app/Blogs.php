<?php

namespace App;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    protected $fillable = ['title', 'tags', 'details', 'admins_id', 'blog_pic', 'categories_id'];


    public  function categories() {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public  function users() {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
