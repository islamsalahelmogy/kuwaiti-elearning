<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $activities=Activity::all();
       return view('teachers.activities.tests.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        $levels = Level::all();
        return view('teachers.activities.tests.create',compact('topics','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);

        $Validator = validator::make($request->all(),[
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'topic_id' => 'required',
            'level_id' => 'required',
            'published'=>'required'
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }     
            $activity  =  new Activity();
            $activity->title = $request->title;
            $activity->description = $request->description;
            $activity->topic_id=$request->topic_id;
            $activity->level_id=$request->level_id;
            $activity->published=$request->published;
            $activity->teacher_id=Auth::guard('teacher')->user()->id;
            $activity->save();

        return redirect(route('test.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity=Activity::find($id);
        $topics = Topic::all();
        $levels = Level::all();
       return view('teachers.activities.tests.edit',compact('activity','topics','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Validator = validator::make($request->all(),[
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'topic_id' => 'required',
            'level_id' => 'required',
            'published'=>'required'
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }    
            $activity=Activity::find($id); 
            $activity->title = $request->title;
            $activity->description = $request->description;
            $activity->topic_id = $request->topic_id;
            $activity->level_id = $request->level_id;
            $activity->published = $request->published;
            $activity->teacher_id=Auth::guard('teacher')->user()->id;
            $activity->save();

        return redirect(route('test.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $teacher_id=Auth::guard('teacher')->user()->id;
        $activity=Activity::find($id);
        if($activity->questions->count()>0) {
           $questions= $activity->questions;
            foreach ($questions as $q) 
            {
                foreach ($q->answers as $a ) {
                    $a->delete();
                }
                $q->delete();
            }
        }
        if (is_dir(public_path('storage\activities\\' . $teacher_id.'\\'.$activity->id )) == true) {
            File::deleteDirectory(public_path('storage\activities\\' . $teacher_id.'\\'.$activity->id ));
        }
        $activity->students->dettach();
        $activity->delete();
        return redirect(route('test.index'));
    }


    public function result($id)
    {
        $activity=Activity::find($id);
        return view('teachers.activities.tests.result',compact('activity'));
    }
}
