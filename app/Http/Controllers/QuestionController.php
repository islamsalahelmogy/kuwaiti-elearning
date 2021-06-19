<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$questions=Question::where('activity_id',$id)->get();
        $activity=Activity::find($id);
        return view('teachers.activities.questions.index',compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $activity_id=$id;
        return view('teachers.activities.questions.create',compact('activity_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
        $Validator = validator::make($request->all(),[
            'question' => 'required|max:255|string',
            'attach_type' => 'required',
            'attachment' => 'mimes:jpeg,jpg,png,gif',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'correct_answer'=>'required'

         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او png  اوgif' 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }
        

        if ($request->hasFile('attachment') && $request->attach_type== 'image') {
            $question  =  new Question();
            $activity_id = $id;
            $teacher_id=Auth::guard('teacher')->user()->id;
            
            if (is_dir(public_path('storage\activities\\' . $teacher_id)) == false) {
                mkdir(public_path('storage\activities\\' . $teacher_id));
            }

            if (is_dir(public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id )) == false) {
                mkdir(public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id ));
            }
            $image_path = public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id );
            $image_name = str_replace([' ','#','&','=','?'],'-',$request->attachment->getClientOriginalName());
            $image_file = $request->file('attachment');
            $image_file->move($image_path, $image_name);
            $question->attachment = $image_name;
            $question->question = $request->question;
            $question->attach_type = $request->attach_type;
            $question->activity_id = $activity_id;
            $question->save();
           
            if($request->correct_answer =='answer1'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'true'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);
            }
            elseif($request->correct_answer =='answer2'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'true'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            elseif($request->correct_answer =='answer3'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'true'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            else{
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'true'
                    ]);
            }
            
        }
        else{

            $question  =  new Question();
            $activity_id = $id;
            $question->question = $request->question;
            $question->attach_type = $request->attach_type;
            $question->activity_id = $activity_id;
            $question->attachment= 'null';
            $question->save();
           
            if($request->correct_answer =='answer1'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'true'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);
            }
            elseif($request->correct_answer =='answer2'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'true'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            elseif($request->correct_answer =='answer3'){
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'true'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            else{
                $question->answers()->create([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers()->create([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers()->create([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'true'
                    ]);
            }

        }

        return redirect(route('question.index',['id'=> $activity_id]));
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
        $question=Question::find($id);
        $answers=$question->answers->toArray();
        return view('teachers.activities.questions.edit',compact('question','answers'));
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
            'question' => 'required|max:255|string',
            'attach_type' => 'required',
            'attachment' => 'mimes:jpeg,jpg,png,gif',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'correct_answer'=>'required'

         
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او png  اوgif' 
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }
        

        if ($request->hasFile('attachment') && $request->attach_type== 'image') {
            $question  =  Question::find($id);
            $activity_id = $question->activity_id;
            $teacher_id=Auth::guard('teacher')->user()->id;
            
            if (is_dir(public_path('storage\activities\\' . $teacher_id)) == false) {
                mkdir(public_path('storage\activities\\' . $teacher_id));
            }

            if (is_dir(public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id )) == false) {
                mkdir(public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id ));
            }
            $image_path = public_path('storage\activities\\' . $teacher_id.'\\'.$activity_id );
            $image_name = str_replace([' ','#','&','=','?'],'-',$request->attachment->getClientOriginalName());
            $image_file = $request->file('attachment');
            $image_file->move($image_path, $image_name);
            $question->attachment = $image_name;
            $question->question = $request->question;
            $question->attach_type = $request->attach_type;
            $question->save();
            if($request->correct_answer =='answer1'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'true'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);
            }
            elseif($request->correct_answer =='answer2'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'true'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            elseif($request->correct_answer =='answer3'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'true'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            else{
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'true'
                    ]);
            }
            
        }
        else{

            $question  = Question::find($id);
            $activity_id = $question->activity_id;
            $teacher_id=Auth::guard('teacher')->user()->id;
            $question->question = $request->question;
            $question->attach_type = $request->attach_type;
            if (is_dir(public_path('storage\activities\\' . $teacher_id.'\\'.$question->activity_id )) == true) {
                File::delete(public_path('storage\activities\\' . $teacher_id.'\\'.$question->activity_id .'\\'.$question->attachment));
            }
            $question->attachment = 'null';
            $question->save();
            if($request->correct_answer =='answer1'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'true'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);
            }
            elseif($request->correct_answer =='answer2'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'true'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            elseif($request->correct_answer =='answer3'){
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'true'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'false'
                    ]);

            }
            else{
                $question->answers['0']->update([
                    'answer'=>$request->answer1,
                    'correct_answer'=>'false'
                ]);
                $question->answers['1']->update([
                    'answer'=>$request->answer2,
                    'correct_answer'=>'false'
                ]);

                $question->answers['2']->update([
                    'answer'=>$request->answer3,
                    'correct_answer'=>'false'
                ]);

                $question->answers['3']->update([
                    'answer'=>$request->answer4,
                    'correct_answer'=>'true'
                    ]);
            }

        }

        return redirect(route('question.index',['id'=> $activity_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
       
        $teacher_id=Auth::guard('teacher')->user()->id;
        $question=Question::find($id);
        $activity_id=$question->activity_id;
        if($question->answers->count()>0) {
            $answers= $question->answers;
            foreach ($answers as $a) 
            {
                $a->delete();
            }
        }
        if (is_dir(public_path('storage\activities\\' . $teacher_id.'\\'.$question->activity_id )) == true) {
            File::delete(public_path('storage\activities\\' . $teacher_id.'\\'.$question->activity_id .'\\'.$question->attachment));
        }
        $question->delete(); 
        return redirect(route('question.index',['id'=>$activity_id]));
    }
}
