<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AuthenticatesUsers;


    protected function TeacherValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'password' => ['required', 'string', 'min:8'],
            
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 8 خانات',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]
        );
    }

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
    
            return Teacher::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);
       
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $teacher=Auth::guard('teacher')->user();
        return view('teachers.profile.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data =$this->TeacherValidator($request->all());
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
    
        $teacher=Auth::guard('teacher')->user();

         if(Hash::check($request->password,$teacher->password))
         {  
            $teacher->update([
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
        return view('teachers.password.index');
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
            'old_password_t' => ['required', 'string', 'min:8'],
            'new_password_t' => ['required', 'string', 'min:8'],
            'new_password_confirmation_t' => ['required', 'string', 'min:8','same:new_password_t']

        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $id = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($id);
        
        if (Hash::check($request->old_password_t, $teacher->password)) {
            $teacher->password = Hash::needsRehash($request->new_password_t) ? 
                Hash::make($request->new_password_t) : $request->new_password_t;
            $teacher->save();
            Auth::guard('teacher')->attempt(['email' => $teacher->email, 'password' => $request->new_password_t]);

        } else {
            return response()->json(['errors' => ['old_password_t' => ['كلمة السر غير صحيحة']]]);
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

}
