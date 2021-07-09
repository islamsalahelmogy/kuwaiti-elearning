<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Topic;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class TeacherVideoController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $videos = Content::where('teacher_id', $teacherId)->where('attach_type', 'video')->orderBy('created_at','desc')->get();
        return view('teachers.videos.index', compact('videos'));
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
        return view('teachers.videos.create', compact('topics','levels'));
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
            'title' => 'required|max:255|string',
            'description' => 'required|string',
            'attachment' => 'required|mimetypes:video/x-msvideo,video/mp4,video/x-matroska',
            'topic_id' => 'required',
            'level_id' => 'required'
         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
            'mimetypes' => 'لا بد ان يكون نوع الملف mp4 او mkv'
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }
        

        if ($request->hasFile('attachment')) {
            $video  =  new Content();
            $teacher_id = Auth::guard('teacher')->user()->id;
            if (is_dir(public_path('storage\videos\\' . $teacher_id)) == false) {
                mkdir(public_path('storage\videos\\' . $teacher_id));
            }
            $video_path = public_path('storage\videos\\' . $teacher_id);
            $video_name = str_replace([' ','#','&','=','?'],'-',$request->attachment->getClientOriginalName());
            $video_file = $request->file('attachment');
            $video_file->move($video_path, $video_name);
            $video->attachment = $video_name;
            $video->title = $request->title;
            $video->description = $request->description;
            $video->attach_type = "video";
            $video->topic_id = $request->topic_id;
            $video->level_id = $request->level_id;
            $video->teacher_id = $teacher_id;
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
        $video = Content::find($id);
        return view('teachers.videos.show', compact('video'));
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
        $levels = Level::all();
        $path = public_path('storage\videos\\' . $teacherId . '\\' . $video->attachment);
        if (is_file($path)) {
            return view('teachers.videos.edit', compact('video', 'path', 'topics','levels'));
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
            'level_id' => 'required'
         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }
        if ($request->hasFile('attachment')) {
            //dd($request);
            $valid = validator::make($request->all(),[
            'attachment' => 'required|mimetypes:video/x-msvideo,video/mp4,video/x-matroska',
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'mimetypes' => 'لا بد ان يكون نوع الملف mp4 او mkv'
            ]);
            if($valid->fails()){
                return Redirect::back()->withErrors($valid)->withInput($request->all());
            }
            $video = Content::find($id);
            $teacherId = Auth::guard('teacher')->user()->id;
            $file = $request->file('attachment');
            $video_path = public_path('storage\videos\\' . $teacherId);
            $old_video = $video_path . '\\' . $video->attachment;
            $video_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($video_path, $video_name);
            $video->title = $request->title;
            $video->topic_id = $request->topic_id;
            $video->level_id = $request->level_id;
            $video->attachment = $video_name;
            $video->description = $request->description;
            $video->teacher_id = $teacherId;
            $video->save();
            if (file_exists($old_video)) {
                File::delete($old_video);
            }
        } else {
            $video = Content::find($id);
            //dd($request);
            $teacherId = Auth::guard('teacher')->user()->id;
            $video->title = $request->title;
            $video->topic_id = $request->topic_id;
            $video->level_id = $request->level_id;
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
        $video = Content::find($id);
        $videoName = $video->attachment;
        $teacherId = Auth::guard('teacher')->user()->id;
        $file = public_path('storage\videos\\' . $teacherId . "\\" . $videoName);
        if (file_exists($file)) {
            File::delete($file);
        }
        $video->delete();
        return redirect(route('teacher.videos'));
    }
}
