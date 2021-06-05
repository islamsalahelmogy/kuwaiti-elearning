<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;


    protected $fillable = 
    [
        'description',
        'attachment',
        'attach_type',
        'title'
    ];
    public function topic () {
        return $this->belongsTo(Topic::Class);
    }
}
