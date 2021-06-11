<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(Auth::guard('teacher')->check())
    {
        return redirect(route('teacher.dashboard'));
    }
    else if(Auth::guard('student')->check())
    {
        return redirect(route('student.dashboard'));
    }
    else{
        return view('welcome');
    }
    
    })->name('welcome');


 // teacher routes
  
    Route::post('/login/teacher', 'Auth\LoginController@teacherLogin')->name('teacher.login');
    Route::post('/login/teacher/reset/password', 'Auth\LoginController@teacherResetPassword')->name('teacher.reset.password');
    Route::post('/login/teacher/change/password', 'Auth\LoginController@teacherChangePassword')->name('teacher.change.password');
    Route::get('/logout/teacher','Auth\LoginController@teacherLogout')->name('teacher.logout'); 
    Route::get('/teacher/dashboard', 'TeacherController@show')->middleware('isteacher:teacher')->name('teacher.dashboard');
    Route::post('/teacher/update', 'TeacherController@update')->middleware('isteacher:teacher')->name('teacher.update');
   
    



    //Route::view('/teacher', 'teachers/profile/index')->name('teachers')->middleware('isteacher:teacher');

    // video routes
    Route::get('/teacher/video/create', 'TeacherVideoController@create')->name('teacher.video.create')->middleware('isteacher:teacher');
    Route::post('/teacher/video/store', 'TeacherVideoController@store')->name('teacher.video.store')->middleware('isteacher:teacher');
    Route::get('teacher/videos','TeacherVideoController@index')->name('teacher.videos')->middleware('isteacher:teacher');
    Route::get('/teacher/video/edit/{id}', 'TeacherVideoController@edit')->middleware('isteacher:teacher')->name('teacher.video.edit');
    Route::post('/teacher/video/update/{id}', 'TeacherVideoController@update')->middleware('isteacher:teacher')->name('teacher.video.update');
    Route::get('/teacher/video/show/{id}', 'TeacherVideoController@show')->middleware('isteacher:teacher')->name('teacher.video.show');
    Route::get('/teacher/video/delete/{id}', 'TeacherVideoController@destroy')->middleware('isteacher:teacher')->name('teacher.video.delete');
    Route::get('teacher/dashboard','TeacherController@show')->name('teacher.dashboard')->middleware('isteacher:teacher');

    // story routes

    Route::get('/teacher/story/create', 'TeacherStoryController@create')->name('teacher.story.create')->middleware('isteacher:teacher');
    Route::post('/teacher/story/store', 'TeacherStoryController@store')->name('teacher.story.store')->middleware('isteacher:teacher');
    Route::get('/teacher/stories','TeacherStoryController@index')->name('teacher.stories')->middleware('isteacher:teacher');
    Route::get('/teacher/story/edit/{id}', 'TeacherStoryController@edit')->middleware('isteacher:teacher')->name('teacher.story.edit');
    Route::post('/teacher/story/update/{id}', 'TeacherStoryController@update')->middleware('isteacher:teacher')->name('teacher.story.update');
    Route::get('/teacher/story/show/{id}', 'TeacherStoryController@show')->middleware('isteacher:teacher')->name('teacher.story.show');
    Route::get('/teacher/story/delete/{id}', 'TeacherStoryController@destroy')->middleware('isteacher:teacher')->name('teacher.story.delete');
    Route::get('/teacher/password/edit','TeacherController@editPassword')->name('teacher.password.edit');
    Route::post('/teacher/password/update','TeacherController@updatePassword')->name('teacher.password.update');
    Route::get('/teacher/story/get/{id}', 'TeacherStoryController@storyGet')->middleware('isteacher:teacher')->name('story.get');
    Route::view('/questions', 'teachers.activities.questions.create');
    //Route::get('/teacher/question', 'TeacherStoryController@storyGet')->middleware('isteacher:teacher')->name('story.get');
    // student routes

    Route::post('/login/student', 'Auth\LoginController@studentLogin')->name('student.login');
    Route::post('/register/student', 'Auth\RegisterController@createStudent')->name('student.register');
    Route::post('/login/student/reset/password', 'Auth\LoginController@studentResetPassword')->name('student.reset.password');
    Route::post('/login/student/change/password', 'Auth\LoginController@studentChangePassword')->name('student.change.password');
    Route::get('/logout/student','Auth\LoginController@studentLogout')->name('student.logout');
    Route::get('/student/dashboard','StudentController@show')->name('student.dashboard')->middleware('isstudent:student');
    Route::post('/student/update', 'StudentController@update')->middleware('isstudent:student')->name('student.update');

    Route::get('/student/password/edit','StudentController@editPassword')->name('student.password.edit');
    Route::post('/student/password/update','StudentController@updatePassword')->name('student.password.update');


    //admin routes 

    Route::get('/admin/teacher/create', 'AdminController@create')->name('admin.teacher.create')->middleware('isadmin:teacher');
    Route::post('/admin/teacher/store', 'AdminController@store')->name('admin.teacher.store')->middleware('isadmin:teacher');
    Route::get('/admin/teacher/index','AdminController@index')->name('admin.teacher.index')->middleware('isadmin:teacher');
    Route::get('/admin/teacher/edit/{id}', 'AdminController@edit')->name('admin.teacher.edit')->middleware('isadmin:teacher');
    Route::post('/admin/teacher/update/{id}', 'AdminController@update')->name('admin.teacher.update')->middleware('isadmin:teacher');
    Route::get('/admin/teacher/delete/{id}', 'AdminController@destroy')->name('admin.teacher.delete')->middleware('isadmin:teacher');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::view('/home', 'home')->middleware('auth');

// Route::get('/home',function () {
//     return view('app.home');
// })->name('home');

// Route::get('/teachers',function () {
//     return view('app.teachers.index');
// })->name('teachers');

// Route::get('/students/profile',function () {
//     return view('students.profile.index');
// })->name('students.profile');

// Route::get('/teachers/profile',function () {
//     return view('teachers.profile.index');
// })->name('teachers.profile');
// Route::get('/teachers/password/edit',function () {
//     return view('teachers.password.index');
// })->name('teachers.password.edit');
// Route::get('/students/password/edit',function () {
//     return view('students.password.index');
// })->name('students.password.edit');

Route::get('/teachers/dashboard',function () {
    return view('teachers.teacher.index');
})->name('teachers.teacher.index');