<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

//Auth::routes();
    

    // teacher routes
    //Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm');
    //Route::get('/register/teacher', 'Auth\RegisterController@showTeacherRegisterForm');

    Route::post('/login/teacher', 'Auth\LoginController@teacherLogin')->name('teacher.login');
    // Route::post('/register/teacher', 'Auth\RegisterController@createTeacher')->name('teacher.register')/* ->middleware('auth:teacher') */;
    Route::post('/login/teacher/reset/password', 'Auth\LoginController@teacherResetPassword')->name('teacher.reset.password');
    Route::post('/login/teacher/change/password', 'Auth\LoginController@teacherChangePassword')->name('teacher.change.password');
    Route::get('/logout/teacher','Auth\LoginController@teacherLogout')->name('teacher.logout');
    Route::view('/teacher', 'teachers/profile/index')->middleware('auth:teacher');




    // student routes

    //Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
    //Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm');
    Route::post('/login/student', 'Auth\LoginController@studentLogin')->name('student.login');
    Route::post('/register/student', 'Auth\RegisterController@createStudent')->name('student.register');
    Route::post('/login/student/reset/password', 'Auth\LoginController@studentResetPassword')->name('student.reset.password');
    Route::post('/login/student/change/password', 'Auth\LoginController@studentChangePassword')->name('student.change.password');
    Route::get('/logout/student','Auth\LoginController@studentLogout')->name('student.logout');
    Route::view('/student', 'students/profile/index')->middleware('auth:student');


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