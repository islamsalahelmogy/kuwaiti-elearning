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


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
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
    public function show(Teacher $teacher)
    {
        return view('teachers.profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
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
            $teacher->password = Hash::needsRehash($request->new_password_t) ? Hash::make($request->new_password_t) : $request->new_password_t;
            $teacher->save();
            Auth::guard('teacher')->attempt(['email' => $teacher->email, 'password' => $request->new_password_t]);

        } else {
            return response()->json(['errors' => ['old_password_t' => ['كلمة السر غير صحيحة']]]);
        }

        
        //return response()->json([$student]);

        
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
