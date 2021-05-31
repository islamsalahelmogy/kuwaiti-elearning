<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:teacher')->except(['teacherLogout','teacherResetPassword','teacherCahngePassword']);
        $this->middleware('guest:student')->except(['studentLogout','studentResetPassword','studentCahngePassword']);
    }


    public function teacherLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email_tl'   => 'required|email',
            'password_tl' => 'required|min:8'
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $check = Auth::guard('teacher')->attempt(['email' => $request->email_tl, 'password' => $request->password_tl], 
                $request->get('remember_tl'));
        if($check == false) 
            return response()->json(['errors' => ['invalid_tl' => ['هناك خطأ ما! تأكد ان بياناتك صحيحه']]]);

    }
    public function teacherLogout(Request $request){
        Auth::guard('teacher')->logout();
        header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
        header("Pragma:no-cache");
        header("Expires: Sat,26 Jul 1997 05:00:00: GMT");
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect('/');
    }

    public function teacherResetPassword (Request $request){
        $validator = Validator::make($request->all(), [
            'email_trp'   => 'required|email',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'email' => 'هذا الإيميل غير صحيح',
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $teacher = Teacher::where('email',$request->email_trp)->get();
        if($teacher->count() == 1){
            foreach($teacher as $t)
                $tEmail = $t->email;
            return response()->json(['email_trp' => $tEmail]);
        }
        return response()->json(['errors' => ['invalid_trp' => ['الإيميل غير موجود']]]);

    }

    public function teacherChangePassword (Request $request){
    
        $validator = Validator::make($request->all(), [
            'password_tcp' => ['required', 'string', 'min:8'],
            'password_confirmation_tcp' => ['required', 'string', 'min:8','same:password_tcp']

        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        Teacher::where('email',$request->email)->update(['password'=>Hash::make($request->password_tcp)]);
        
        //return response()->json([$student]);

        if($request->logout_devices_tcp == "on")
            Auth::guard('teacher')->logoutOtherDevices($request->password_tcp);

        Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password_tcp]);

    }


    public function studentLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email_stl'   => 'required|email',
            'password_stl' => 'required|min:8'
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        $check = Auth::guard('student')->attempt(['email' => $request->email_stl, 'password' => $request->password_stl], 
                $request->get('remember_stl'));
        if($check == false) 
            return response()->json(['errors' => ['invalid_stl' => ['هناك خطأ ما! تأكد ان بياناتك صحيحه']]]);

    }

    public function studentResetPassword (Request $request){
        $validator = Validator::make($request->all(), [
            'email_strp'   => 'required|email',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'email' => 'هذا الإيميل غير صحيح',
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $Student = Student::where('email',$request->email_strp)->get();
        if($Student->count() == 1){
            foreach($Student as $st)
                $stEmail = $st->email;
            return response()->json(['email_strp' => $stEmail]);
        }
        return response()->json(['errors' => ['invalid_strp' => ['الإيميل غير موجود']]]);

    }

    public function studentChangePassword (Request $request){
    
        $validator = Validator::make($request->all(), [
            'password_stcp' => ['required', 'string', 'min:8'],
            'password_confirmation_stcp' => ['required', 'string', 'min:8','same:password_stcp']

        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف'
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        Student::where('email',$request->email)->update(['password'=>Hash::make($request->password_stcp)]);
        
        //return response()->json([$student]);

        if($request->logout_devices_stcp == "on")
            Auth::guard('student')->logoutOtherDevices($request->password_stcp);

        Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password_stcp]);

    }

    public function studentLogout(Request $request){
    
        Auth::guard('student')->logout();
       $request->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
       $request->header("Pragma:no-cache");
        $request->header("Expires: Sat,26 Jul 1997 05:00:00: GMT");
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

}
