<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="users";

    protected $fillable = [
        'name', 'email', 'image' ,  'password', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function blogs()
    {
        return $this->hasMany(Blog::class , 'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
