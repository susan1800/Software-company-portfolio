<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyIcon extends Model
{
    use HasFactory;
    protected $table ='company_icons';
    protected $fillable = [
         'title', 'icon' , 'status',
];
}
