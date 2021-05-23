<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Teacher extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

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
}
