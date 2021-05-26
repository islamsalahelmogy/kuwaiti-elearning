<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:teacher')->except('createTeacher');
        $this->middleware('guest:student');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function TeacherValidator(array $data)
    {
        return Validator::make($data, [
            'name_tr' => ['required', 'string', 'max:255'],
            'email_tr' => ['required', 'string', 'email', 'max:255', 'unique:teachers,email'],
            'gender_tr' => ['required', 'string', 'max:255'],
            'phone_tr' => ['required', 'numeric', 'digits:11'],
            'password_tr' => ['required', 'string', 'min:8'],
            'password_confirmation_tr' => ['required', 'string', 'min:8','same:password_tr']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone_tr.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 11 خانه',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'unique' => 'هذا الإيميل موجود بالفعل',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]
        );
    }

    protected function StudentValidator(array $data)
    {
        return Validator::make($data, [
            'name_str' => ['required', 'string', 'max:255'],
            'email_str' => ['required', 'string', 'email', 'max:255', 'unique:students,email'],
            'gender_str' => ['required', 'string', 'max:255'],
            'password_str' => ['required', 'string', 'min:8'],
            'password_confirmation_str' => ['required', 'string', 'min:8','same:password_str']

        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'unique' => 'هذا الإيميل موجود بالفعل',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    public function showTeacherRegisterForm()
    {
        return view('auth.teacherRegister');
    }

    protected function createTeacher(Request $request){
        //dd($request->all());
        $data =$this->TeacherValidator($request->all());
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
        Teacher::create([
                'name' => $request['name_tr'],
                'email' => $request['email_tr'],
                'phone' => $request['phone_tr'],
                'gender' => $request['gender_tr'],
                'password' => Hash::make($request['password_tr']), 
        ]);
        //Auth::guard('teacher')->attempt(['email' => $request->email_tr, 'password' => $request->password_tr]);
        //return redirect()->intended('/student');

    }
    
    public function showStudentRegisterForm()
    {
        return view('auth.studentRegister');
    }

    protected function createStudent(Request $request){
        //dd($request->all());
        $data =$this->StudentValidator($request->all());
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
        Student::create([
                'name' => $request['name_str'],
                'email' => $request['email_str'],
                'gender' => $request['gender_str'],
                'password' => Hash::make($request['password_str']), 
        ]);
        Auth::guard('student')->attempt(['email' => $request->email_str, 'password' => $request->password_str]);
        //return redirect()->intended('/student');

    }

}
