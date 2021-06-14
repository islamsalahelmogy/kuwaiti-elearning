<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Topic;
use App\Models\Level;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $levels = Level::all(['id','name']);
        return view('app.activities.index',compact('levels'));
    }
    public function topics(Request $r)
    {
        $levelId = $r->levelId;
        $activities = Activity::where('level_id',$levelId)->get();
        $topics = [];
        foreach ($activities as $a) {
            $flag=true;
            if(count($topics) > 0) {
                foreach ($topics as $t) {
                    if($t['id'] == $a->topic->id) {
                        $flag = false;
                        break;
                    }
                }
            }
            if($flag)
                array_push($topics,['id'=>$a->topic->id,'name'=>$a->topic->name]);
        }
        return view('app.activities.topics',compact('topics','levelId'));
    }
    


    public function teachers(Request $r)
    {
        $topicId = $r->topicId;
        $levelId = $r->levelId;

        $teachers = [];
        $flag = false;
        $activities = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId]
        ])->get();
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
        return view('app.activities.teachers',compact('teachers','topicId','levelId'));
    }
    
    public function activities (Request $r) {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $activites = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['teacher_id',$teacherId],
        ])->get();
        return view('app.activities.allactivities',compact('activities'));
        
    
    }
    public function showactivity($id)
    {
        $activity = Activity::find($id);
        //dd($video);
        return view('app.activities.activityShow', compact('activity'));
    }
}
