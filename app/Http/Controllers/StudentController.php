<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{


    protected function StudentValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
                'email' => 'هذا الإيميل غير صحيح',
                'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
                'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
            ]
        );
    }




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
    public function store(array $data)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $student=Auth::guard('student')->user();
        return view('students.profile.show',compact('student'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data =$this->StudentValidator($request->all());
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
    
        $student=Auth::guard('student')->user();

         if(Hash::check($request->password,$student->password))
         {  
            $student->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'gender' => $request['gender'],      
        ]);

         }
         else{
            return response()->json(['errors'=>['password'=>['كلمة المرور غير صحيحة']]]);
         }

    }
    
    public function editPassword()
    {
        return view('students.password.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password_st' => ['required', 'string', 'min:8'],
            'new_password_st' => ['required', 'string', 'min:8'],
            'new_password_confirmation_st' => ['required', 'string', 'min:8','same:new_password_st']

        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $id = Auth::guard('student')->user()->id;
        $student = Student::find($id);
        
        if (Hash::check($request->old_password_st, $student->password)) {
            $student->password = Hash::needsRehash($request->new_password_st) ? 
                Hash::make($request->new_password_st) : $request->new_password_st;
            $student->save();
            Auth::guard('student')->attempt(['email' => $student->email, 'password' => $request->new_password_st]);

        } else {
            return response()->json(['errors' => ['old_password_st' => ['كلمة السر غير صحيحة']]]);
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

   
}
