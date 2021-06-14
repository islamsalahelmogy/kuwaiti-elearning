<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Level;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $levels = Level::all(['id','name']);
        return view('app.videos.index',compact('levels'));
    }
    
    public function topics(Request $r)
    {
        $levelId = $r->levelId;
        $contents = Content::where('level_id',$levelId)->get();
        $topics = [];
        foreach ($contents as $c) {
            if($c->attach_type == 'video') {
                $flag=true;
                if(count($topics) > 0) {
                    foreach ($topics as $t) {
                        if($t['id'] == $c->topic->id) {
                            $flag = false;
                            break;
                        }
                    }
                }
                if($flag)
                    array_push($topics,['id'=>$c->topic->id,'name'=>$c->topic->name]);
            }
            
        }
        return view('app.videos.topics',compact('topics','levelId'));
    }

    public function teachers(Request $r)
    {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $contents = Content::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['attach_type','video']
        ])->get();
        $teachers = [];
        $flag = false;
        foreach ($contents as $c) {
            if(count($teachers) > 0) {
                foreach ($teachers as $t) {
                    if($t['id'] == $c->teacher->id) {
                        $flag = true;
                        break;
                    }
                }
            }
            if($flag == false)
                array_push($teachers,['id'=>$c->teacher->id,'name'=>$c->teacher->name]);
        }
        return view('app.videos.teachers',compact('teachers','topicId','levelId'));
    }

    public function videos (Request $r) {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $videos = Content::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['teacher_id',$teacherId],
            ['attach_type','video'],
        ])->get();
        return view('app.videos.allvideos',compact('videos'));
        
    
    }
    public function showvideo($id)
    {
        $video = Content::find($id);
        //dd($video);
        return view('app.videos.videoShow', compact('video'));
    }
    
}
