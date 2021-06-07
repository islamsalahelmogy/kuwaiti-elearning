<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;



class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    protected function TeacherValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:11'],
            'password' => ['required', 'string', 'min:8'],
            
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 11 خانه',
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
        return view('teachers.teacher.show',compact('teacher'));
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
