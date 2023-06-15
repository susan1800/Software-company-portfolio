<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table ='portfolios';
    protected $fillable = [
        'title' , 'image', 'details' ,'link', 'category_id' , 'status' ,
];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
