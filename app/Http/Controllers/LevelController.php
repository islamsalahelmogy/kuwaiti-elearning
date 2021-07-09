<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels=Level::all();
        return view('teachers.levels.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.levels.create');
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
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }     
            $level  =  new Level();
            $level->name = $request->name;
            $level->save();

        return redirect(route('level.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level=Level::find($id);
       return view('teachers.levels.edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Validator = validator::make($request->all(),[
            'name' => 'required|max:255|string',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }    
            $topic=Level::find($id); 
            $topic->name = $request->name;
            $topic->save();

        return redirect(route('level.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level=Level::find($id);
        $level->delete();
        return redirect(route('level.index'));
    }
}
