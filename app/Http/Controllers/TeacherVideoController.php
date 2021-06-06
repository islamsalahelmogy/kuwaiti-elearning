<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class TeacherVideoController extends Controller
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
        $topics=Topic::all();
        return view('teachers.videos.create' ,compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
           'attachment' => 'required|mimetypes:video/x-msvideo,video/mpeg,video/mp4,video/x-matroska',
            'topic_id' => 'required',
         
        ]);
     
        if ($request->hasFile('attachment'))
        {
           $video  =  new Content();
           $teacher_id=Auth::guard('teacher')->user()->id;  
           if(is_dir(public_path('storage\videos\\'.$teacher_id))==false)
           {
               mkdir(public_path('storage\videos\\'.$teacher_id));
           }
           $video_path=public_path('storage\videos\\'.$teacher_id); 
           $video_name=$request->attachment->getClientOriginalName();
           $video_file=$request->file('attachment');
           $video_file->move($video_path,$video_name);
           $video->attachment=$video_name;
           $video->title=$request->title;
           $video->description=$request->description;
           $video->attach_type="video";
           $video->topic_id=$request->topic_id;
           $video->teacher_id=$teacher_id;
           $video->save();
        }
        
        return redirect(route('teacher.videos'));

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
        $video = Content::find($id);
        $topics = Topic::all();
        $path = public_path('storage\videos\\'.$teacherId.'\\'.$video->attachment);
        if(is_file($path)) {
            return view('teachers.videos.edit',compact('video','path','topics'));
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
                'attachment' => 'required|mimetypes:video/x-msvideo,video/mpeg,video/mp4,video/x-matroska',
            ]);
            $video = Content::find($id);
            $teacherId = Auth::guard('teacher')->user()->id;
            $file = $request->file('attachment');
            $video_path = public_path('storage\videos\\'.$teacherId);
            $old_video = $video_path.'\\'.$video->attachment;
            $video_name = $file->getClientOriginalName();
            $file->move($video_path,$video_name);
            $video->title = $request->title;
            $video->topic_id = $request->topic_id;
            $video->attachment = $video_name;
            $video->description = $request->description;
            $video->teacher_id = $teacherId;
            $video->save();
            if(file_exists($old_video)) {
                File::delete($old_video);
            }
            
        } else {
            $video = Content::find($id);
            //dd($request);
            $teacherId = Auth::guard('teacher')->user()->id;
            $video->title = $request->title;
            $video->topic_id = $request->topic_id;
            $video->description = $request->description;
            $video->teacher_id = $teacherId;
            $video->save();
        }
        return redirect(route('teacher.videos'));
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
