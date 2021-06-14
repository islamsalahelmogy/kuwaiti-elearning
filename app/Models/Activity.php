<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class,'student_activity')->withTimestamps();
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
