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
        'title' , 'image' , 'details' , 'category_id' , 'status' , 'count' ,
];

public function category()
{
    return $this->belongsTo(Category::class , 'category_id');
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
