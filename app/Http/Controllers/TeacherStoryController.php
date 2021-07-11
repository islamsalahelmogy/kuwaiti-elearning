<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class TeacherStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $teacherId = Auth::guard('teacher')->user()->id; 
            $stories = Content::where('teacher_id',$teacherId)->where('attach_type','audio')->orderBy('created_at','desc')->get();
            //dd($stories->toArray());
            return view('teachers.stories.index',compact('stories'));
    }
    

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics=Topic::all();
        $levels=Level::all();
        return view('teachers.stories.create' ,compact('topics','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       //dd($request);
        $Validator = validator::make($request->all(),[
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'attachment' => 'required|mimetypes:audio/mpeg,audio/mp3',
            'topic_id' => 'required',
            'level_id' => 'required',
         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
            'mimetypes' => 'لا بد ان يكون نوع الملف mp3 او mpeg'
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }
        if ($request->hasFile('attachment'))
        {
           $audio  =  new Content();
           $teacher_id=Auth::guard('teacher')->user()->id;  
           if(is_dir(public_path('storage\stories\\'.$teacher_id))==false)
           {
               mkdir(public_path('storage\stories\\'.$teacher_id));
           }
           $audio_path=public_path('storage\stories\\'.$teacher_id); 
           $audio_name=time().str_replace([' ','#','&','=','?'],'-',$request->attachment->getClientOriginalName());
           $audio_file=$request->file('attachment');
           $audio_file->move($audio_path,$audio_name);
           $audio->attachment=$audio_name;
           $audio->title=$request->title;
           $audio->description=$request->description;
           $audio->attach_type="audio";
           $audio->topic_id=$request->topic_id;
           $audio->level_id=$request->level_id;
           $audio->teacher_id=$teacher_id;
           $audio->save();
        }
        
        return redirect(route('teacher.stories'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Content::find($id);
        //dd($story);
        return view('teachers.stories.show',compact('story'));
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
        $levels = Level::all();
        $path = public_path('storage\stories\\'.$teacherId.'\\'.$story->attachment);
        if(is_file($path)) {
            return view('teachers.stories.edit',compact('story','path','topics','levels'));
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
        $Validator = validator::make($request->all(),[
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'topic_id' => 'required',
            'level_id' => 'required',
         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
        ]);

        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }

        if($request->hasFile('attachment')) {
            //dd($request);
            $valid = validator::make($request->all(),[
            'attachment' => 'required|mimetypes:audio/mpeg,audio/mp3',
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'mimetypes' => 'لا بد ان يكون نوع الملف mp3 او mpeg'
            ]);
            if($valid->fails()){
                return Redirect::back()->withErrors($valid)->withInput($request->all());
            }
            $story = Content::find($id);
            $teacherId = Auth::guard('teacher')->user()->id;
            $file = $request->file('attachment');
            $story_path = public_path('storage\stories\\'.$teacherId);
            $old_story = $story_path.'\\'.$story->attachment;
            $story_name =time().str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($story_path,$story_name);
            $story->title = $request->title;
            $story->topic_id = $request->topic_id;
            $story->level_id=$request->level_id;
            $story->attachment = $story_name;
            $story->description = $request->description;
            $story->teacher_id = $teacherId;
            $story->save();
            if(file_exists($old_story)) {
                File::delete($old_story);
            }
            
        } else {
            $story = Content::find($id);
            $teacherId = Auth::guard('teacher')->user()->id;
            $story->title = $request->title;
            $story->topic_id = $request->topic_id;
            $story->level_id = $request->level_id; 
            $story->description = $request->description;
            $story->teacher_id = $teacherId;
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
        $story = Content::find($id);
        $storyName = $story->attachment;
        $teacherId = Auth::guard('teacher')->user()->id;
        $file = public_path('storage\stories\\'.$teacherId."\\".$storyName);
        if(file_exists($file)) {
                File::delete($file);
        }
        $story->delete();
        return redirect(route('teacher.stories'));
    }
}
