<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyFact extends Model
{
    use HasFactory;
    protected $table ='company_facts';
    protected $fillable = [
         'title', 'number' , 'category_id' , 'status',
];
public function category()
{
    return $this->belongsTo(Category::class , 'category_id');
}

}
