<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;
    protected $table ='general_information';
    protected $fillable = [
         'title', 'subtitle' , 'details' ,  'link'  , 'status' ,
];
}
