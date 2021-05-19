<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:student')->except('logout');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function StudentValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'gender' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

    protected function createTeacher(Request $request)
    {
        $this->TeacherValidator($request->all())->validate();
        $admin = Teacher::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']), 
        ]);
        return redirect()->intended('login/teacher');
    }
    
    public function showStudentRegisterForm()
    {
        return view('auth.studentRegister');
    }

    protected function createStudent(Request $request)
    {
        $data=$this->StudentValidator($request->all())->validate();
        $admin = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'password' => Hash::make($data['password']), 
        ]);
        return redirect()->intended('login/student');
    }

}
