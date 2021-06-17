<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function activities()
    {
        return $this->belongsToMany(Activity::class,'student_activity')->withPivot('result', 'wrong_answer')->as('studentResult')->withTimestamps();
    }
}
