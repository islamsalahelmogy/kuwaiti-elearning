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
    
    public function getExtTypeAttribute()
    {
        $FILE = $this->attachment;
        $tmp = explode(".",$FILE);
        $type = end($tmp);
        if($this->attach_type == 'video') {
            switch ($type) {
                case 'avi':
                case 'AVI':
                    return 'video/x-msvideo';
                    break;
                case 'mkv':
                case 'MKV':
                    return 'video/x-matroska';
                    break;
                case 'mp4':
                case 'MP4':
                    return 'video/mp4';
                    break;
                default:
                    return 'video/mpeg';
                    break;
            }
        } else {
            switch ($type) {
                case 'mp3':
                    return 'audio/mpeg';
                    break;
                default:
                    return 'audio/mpeg';
                    break;
            }
        }
        
    }
    
    public function getPathAttribute() {
        $path = "/storage/";
        if($this->attach_type == 'video') {
            return $path."videos/".$this->teacher_id."/".$this->attachment ;
        } else {
            return $path."stories/".$this->teacher_id."/".$this->attachment ;

        }
    }


    protected $appends = ['ext_type','path'];


    public function topic () {
        return $this->belongsTo(Topic::class);
    }
    
    public function teacher () {
        return $this->belongsTo(Teacher::class);
    }

}
