<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::all();
        return view('teachers.topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = validator::make($request->all(),[
            'name' => 'required|max:255|string',
            'description' => 'required|string',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }     
            $topic  =  new Topic();
            $topic->name = $request->name;
            $topic->description = $request->description;
            $topic->save();

        return redirect(route('topic.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic=Topic::find($id);
       return view('teachers.topics.edit',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Validator = validator::make($request->all(),[
            'name' => 'required|max:255|string',
            'description' => 'required|string',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }    
            $topic=Topic::find($id); 
            $topic->name = $request->name;
            $topic->description = $request->description;
            $topic->save();

        return redirect(route('topic.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic=Topic::find($id);
        $topic->delete();
        return redirect(route('admin.topic.index'));
    }
}
