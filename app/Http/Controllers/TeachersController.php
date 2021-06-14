<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Level;
use App\Models\Content;
use App\Models\Activity;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        
        $levels = Level::all(['id','name']);
        return view('app.teachers.index',compact('levels'));
    }
    public function teachers(Request $r)
    {
        $levelId = $r->levelId;
        $contents = Content::where('level_id',$levelId)->get();
        //dd($contents);
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
        //dd($teachers);
        $activities = Activity::where('level_id',$levelId)->get();
        $flag = false;
        foreach ($activities as $a) {
            if(count($teachers) > 0) {
                foreach ($teachers as $t) {
                    if($t['id'] == $a->teacher->id) {
                        $flag = true;
                        break;
                    }
                }
            }
            if($flag == false)
                array_push($teachers,['id'=>$a->teacher->id,'name'=>$a->teacher->name]);
        }
        
        return view('app.teachers.teachers',compact('teachers','levelId'));
    }
    
    public function topics(Request $r)
    {
        $teacherId = $r->teacherId;
        $levelId = $r->levelId;
        $contents = Content::where([
            ['level_id' , $levelId],
            ['teacher_id' , $teacherId],
        ])->get();
        //dd($contents);
        $topics = [];
        $flag = false;
        foreach ($contents as $c) {
            if(count($topics) > 0) {
                foreach ($topics as $t) {
                    if($t['id'] == $c->topic->id) {
                        $flag = true;
                        break;
                    }
                }
            }
            if($flag == false)
                array_push($topics,['id'=>$c->topic->id,'name'=>$c->topic->name]);
        }
        //dd($topics);
        $activities = Activity::where([
            ['level_id' , $levelId],
            ['teacher_id' , $teacherId],
        ])->get();
        $flag = false;
        foreach ($activities as $a) {
            if(count($topics) > 0) {
                foreach ($topics as $t) {
                    if($t['id'] == $a->topic->id) {
                        $flag = true;
                        break;
                    }
                }
            }
            if($flag == false)
                array_push($topics,['id'=>$a->topic->id,'name'=>$a->topic->name]);
        }
        return view('app.teachers.topics',compact('topics','teacherId','levelId'));
    }

    public function contents(Request $r)
    {
        $topicId = $r->topicId;
        $teacherId = $r->teacherId;
        $levelId = $r->levelId;
        $types = [];
        $videos = Content::where([
            ['topic_id' , $topicId],
            ['level_id' , $levelId],
            ['teacher_id' , $teacherId],
            ['attach_type' , 'video'],

        ])->get();
        $stories = Content::where([
            ['topic_id' , $topicId],
            ['level_id' , $levelId],
            ['teacher_id' , $teacherId],
            ['attach_type' , 'audio'],

        ])->get();
        $activities = Activity::where([
            ['topic_id' , $topicId],
            ['level_id' , $levelId],
            ['teacher_id' , $teacherId],
        ])->get();
        if(count($videos) > 0) 
            array_push($types,'videos');
        if(count($stories) > 0) 
            array_push($types,'stories');
        if(count($activities) > 0) 
            array_push($types,'activities');
        //dd($types);
        return view('app.teachers.contents',compact('teacherId','topicId','types','levelId'));
    }
    

    public function storiesAndVideos (Request $r) {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $type = $r->type;
        if($type == 'videos') {
            $videos = Content::where([
                ['topic_id',$topicId],
                ['level_id',$levelId],
                ['teacher_id',$teacherId],
                ['attach_type','video'],
            ])->get();
            return view('app.teachers.videosContent',compact('videos'));
        }
        if($type == 'stories') {
            $stories = Content::where([
                ['topic_id',$topicId],
                ['level_id',$levelId],
                ['teacher_id',$teacherId],
                ['attach_type','audio'],
            ])->get();
            return view('app.teachers.storiesContent',compact('stories'));

        }
    }
    public function showvideo($id)
    {
        $video = Content::find($id);
        //dd($video);
        return view('app.teachers.videoShow', compact('video'));
    }

    public function showstory($id)
    {
        $story = Content::find($id);
        //dd($video);
        return view('app.teachers.storyShow', compact('story'));
    }
    /*completed */






    /* not complete activity*/
    public function activities(Request $r) {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $activities = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['teacher_id',$teacherId],
        ])->get();
        return view('app.teachers.activities',compact('activities'));
    }

}
