<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


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
        return $this->hasMany('App\Content');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}

