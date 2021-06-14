<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected function TeacherValidator(array $data)
    {
        return Validator::make($data, [
            'name_tr' => ['required', 'string', 'max:255'],
            'email_tr' => ['required', 'string', 'email', 'max:255', 'unique:teachers,email'],
            'gender_tr' => ['required', 'string', 'max:255'],
            'phone_tr' => ['required', 'numeric', 'digits:8'],
            'role_tr' => ['required', 'max:255'],
            'password_tr' => ['required', 'string', 'min:8'],
            'password_confirmation_tr' => ['required', 'string', 'min:8','same:password_tr']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone_tr.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 8 خانات',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'unique' => 'هذا الإيميل موجود بالفعل',
            'same' => 'كلمة السر غير متطابقه',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
        ]);
    }

    public function index()
    {
        $current_user_id=Auth::guard('teacher')->user()->id;
        $teachers=Teacher::where('id','!=',$current_user_id)->get();
        return view('teachers.teacher.index',compact('teachers'));
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
    public function store(Request $request)
    {
        $data =$this->TeacherValidator($request->all());
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
        Teacher::create([
                'name' => $request['name_tr'],
                'email' => $request['email_tr'],
                'phone' => $request['phone_tr'],
                'gender' => $request['gender_tr'],
                'role' => $request['role_tr'],
                'password' => Hash::make($request['password_tr']), 
        ]);
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
        $teacher=Teacher::find($id);
        return response()->json(['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'role' => ['required', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 8 خانات',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف',
        ]);
        
        if($data->fails()) {
            return response()->json(['errors'=>$data->errors()]);
        }
    
        $teacher=Teacher::find($id);

         if(Hash::check($request->password,Auth::guard('teacher')->user()->password))
         {  
            $teacher->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'phone' => $request['phone'],
                'gender' => $request['gender'],      
            ]);
         }else{
            return response()->json(['errors'=>['password'=>['كلمة المرور غير صحيحة']]]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::find($id);
        if($teacher->contents->count()>0) {

            $teacher->contents()->delete();
        }
        if($teacher->activities->count()>0) {
            
            $teacher->activities()->delete();  
        }
        if (is_dir(public_path('storage\videos\\' . $teacher->id)) == true) {
            File::deleteDirectory(public_path('storage\videos\\' . $teacher->id));
            
        }
        if (is_dir(public_path('storage\stories\\' . $teacher->id)) == true) {
            File::deleteDirectory(public_path('storage\stories\\' . $teacher->id));
        }
        $teacher->delete();
        return redirect(route('admin.teacher.index'));
    }
}
