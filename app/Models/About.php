<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table ='abouts';
    protected $fillable = [
        'title', 'phone', 'map', 'details', 'image' , 'facebook' , 'twitter' , 'linkedin' , 'github' , 'email','address' ,
    ];

}
