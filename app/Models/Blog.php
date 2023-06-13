<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table ='blogs';
    protected $fillable = [
        'title' , 'subtitle', 'image' , 'details' , 'user_id' , 'cat_id' , 'message_from_author' , 'status' , 'count' ,
];

public function category()
{
    return $this->belongsTo(Category::class , 'cat_id');
}
public function user()
{
    return $this->belongsTo(User::class , 'user_id');
}
public function comment()
{
    return $this->hasMany(Comment::class);
}
}
