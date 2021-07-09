<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Answer;
use App\Models\Level;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
        $activities = Activity::where([
            ['topic_id',$topicId],
            ['level_id',$levelId],
            ['teacher_id',$teacherId],
        ])->get();
        return view('app.activities.allactivities',compact('activities'));
        
    
    }

    public function showactivity($id)
    {
        $activity = Activity::find($id);
        return view('app.activities.activityShow', compact('activity'));
    }
    
    public function setResult(Request $r, $id) {
        $activity = Activity::find($id);
        $totalQuestions = $activity->questions->count();
        $total = $totalQuestions;
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
                    $result -= 1;
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
        return redirect(route('activities.all.show.results',['id'=>$activity->id]));
        //dd($validator->getMessageBag());
    }
    
    public function results($id) {
        $activity = Activity::find($id);
        return view('app.activities.activitiesResult',compact('activity'));

    }
}
