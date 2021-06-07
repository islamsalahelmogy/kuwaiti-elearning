<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Content;


class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'is_admin',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }
    
    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }
}

