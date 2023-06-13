<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTestimonials extends Model
{
    //
    protected $table = "testimonials";
    protected $fillable = [
        'name', 'client_pic', 'designation', 'company', 'title', 'details'
    ];
}
