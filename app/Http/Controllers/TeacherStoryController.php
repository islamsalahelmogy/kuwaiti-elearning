<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $story = Content::find($id);
        $topics = Topic::all();
        $path = public_path('storage\stories\\'.$teacherId.'\\'.$story->attachment);
        if(is_file($path)) {
            return view('teachers.stories.edit',compact('story','path','topics'));
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'topic_id' => 'required',
        ]);

        if($request->hasFile('attachment')) {
            //dd($request);
            $request->validate([
                'attachment' => 'required|mimes:audio/mpeg,mp3',
            ]);
            $story = Content::find($id);
            $teacherId = Auth::guard('teacher')->user()->id;
            $file = $request->file('attachment');
            $story_path = public_path('storage\stories\\'.$teacherId);
            $old_story = $story_path.$story->attachment;
            $story_name = $file->getClientOriginalName();
            $file->move($story_path,$story_name);
            $story->title = $request->title;
            $story->topic_id = $request->topic_id;
            $story->attachment = $story_name;
            $story->description = $request->description;
            $story->teeacher_id = $teacherId;
            $story->save();
            if(is_file($old_story)) {
                File::delete($old_story);
            }
            
        } else {
            $story = Content::find($id);
            //dd($request);
            $teacherId = Auth::guard('teacher')->user()->id;
            $story->title = $request->title;
            $story->topic_id = $request->topic_id;
            $story->description = $request->description;
            $story->teeacher_id = $teacherId;
            $story->save();
        }
        return redirect(route('teacher.stories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}