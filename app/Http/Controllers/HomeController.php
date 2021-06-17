<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Content;
use App\Models\Level;
use Illuminate\Support\Facades\Validator;
use App\Models\Answer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    
    public function index()
    {
        $levels = Level::all(['id','name']);
        return view('app.home.index',compact('levels'));
    }
    
    public function topics(Request $r)
    {
        $levelId = $r->levelId;
        $contents = Content::where('level_id',$levelId)->get();
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
        $activites = Activity::where('level_id',$levelId)->get();
        $flag = false;
        foreach ($activites as $a) {
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
        return view('app.home.topics',compact('topics','levelId'));
    }

    public function teachers(Request $r)
    {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $contents = Content::where([
            ['topic_id',$topicId],
            ['level_id',$levelId]
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
        $activites = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId]
        ])->get();
        $flag = false;
        foreach ($activites as $a) {
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
        return view('app.home.teachers',compact('teachers','topicId','levelId'));
    }

    public function contents(Request $r)
    {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $types = [];
        $videos = Content::where([
            ['topic_id' , $topicId],
            ['level_id',$levelId],
            ['teacher_id' , $teacherId],
            ['attach_type' , 'video'],

        ])->get();
        $stories = Content::where([
            ['topic_id' , $topicId],
            ['level_id',$levelId],
            ['teacher_id' , $teacherId],
            ['attach_type' , 'audio'],

        ])->get();
        $activities = Activity::where([
            ['topic_id' , $topicId],
            ['level_id',$levelId],
            ['teacher_id' , $teacherId],
        ])->get();
        if(count($videos) > 0) 
            array_push($types,'videos');
        if(count($stories) > 0) 
            array_push($types,'stories');
        if(count($activities) > 0) 
            array_push($types,'activities');
        //dd($types);
        return view('app.home.contents',compact('teacherId','topicId','levelId','types'));
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
            return view('app.home.videosContent',compact('videos'));
        }
        if($type == 'stories') {
            $stories = Content::where([
                ['topic_id',$topicId],
                ['level_id',$levelId],
                ['teacher_id',$teacherId],
                ['attach_type','audio'],
            ])->get();
            return view('app.home.storiesContent',compact('stories'));

        }
    }
    public function showvideo($id)
    {
        $video = Content::find($id);
        //dd($video);
        return view('app.home.videoShow', compact('video'));
    }

    public function showstory($id)
    {
        $story = Content::find($id);
        //dd($video);
        return view('app.home.storyShow', compact('story'));
    }

    public function activities(Request $r) {
        $topicId = $r->topicId;
        $levelId = $r->levelId;
        $teacherId = $r->teacherId;
        $activities = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['teacher_id',$teacherId],
        ])->get();
        return view('app.home.activities',compact('activities'));
    }



    public function showactivity($id)
    {
        $activity = Activity::find($id);
        return view('app.home.activityShow', compact('activity'));
    }
    
    public function setResult(Request $r, $id) {
        $activity = Activity::find($id);
        $totalQuestions = $activity->questions->count();
        $total = $totalQuestions*5;
        $result = $total;
        $rules = [];
        foreach ($activity->questions as $q) {
            $rules['question_'.$q->id] = 'required';
        }
        $validator = Validator::make($r->all(),$rules,[
            'required' => " لابد من اختيار اجابة لهذا السؤال"
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput($r->all());
        } 
        $i = 1;
        $wrong_answer = [];
        foreach($r->all() as $k => $v) {
            if($k != '_token') {
                $answer = Answer::find($v);
                if($answer->correct_answer != 'true'){   
                    $result -= 5;
                    $j=$i;
                    $str = 'س '. strtr(strval($j),array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩')) ;
                    array_push($wrong_answer,$str);
                }
                $i++;
            }
        }
        
        
        $wrong = implode(',',$wrong_answer);
        $student = Auth::guard('student')->user();
        $student->activities()->attach([$activity->id => ['result' => $result , 'wrong_answer' => $wrong ]]);
        return redirect(route('home.activities.show.results',['id'=>$activity->id]));
        //dd($validator->getMessageBag());
    }
    
    public function results($id) {
        $activity = Activity::find($id);
        //dd($activity->students()->orderBy('created_at','DESC')->get());
        return view('app.home.activitiesResult',compact('activity'));
    }
}
