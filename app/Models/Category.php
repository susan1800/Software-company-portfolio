<?php

namespace App\Models;

use App\Admin\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use HasFactory;
class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'title', 'subtitle','slug','cat', 'status',
    ];



    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
