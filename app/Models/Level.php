<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }
}
