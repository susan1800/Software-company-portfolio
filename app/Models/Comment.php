<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table ='comments';
    protected $fillable = [
        'name' , 'blog_id', 'comment' , 'email' , 'status' ,
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class , 'blog_id');
    }
    
}
