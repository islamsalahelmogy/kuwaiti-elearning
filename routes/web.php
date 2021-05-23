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
    
    Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm');
    Route::post('/login/teacher', 'Auth\LoginController@teacherLogin')->name('teacher.login');
    Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
    Route::post('/login/student', 'Auth\LoginController@studentLogin')->name('student.login');
    Route::get('/register/teacher', 'Auth\RegisterController@showTeacherRegisterForm');
    Route::post('/register/teacher', 'Auth\RegisterController@createTeacher')->name('teacher.register');
    Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm');
    Route::post('/register/student', 'Auth\RegisterController@createStudent')->name('student.register');
    Route::get('/logout/teacher','Auth\LoginController@teacherLogOut')->name('teacher.logout');
    Route::get('/logout/student','Auth\LoginController@studentLogOut')->name('student.logout');

    Route::view('/home', 'home')->middleware('auth');
    Route::view('/teacher', 'home');
    Route::view('/student', 'home');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home',function () {
    return view('app.home');
})->name('home');

Route::get('/students/profile',function () {
    return view('students.profile.index');
})->name('students.profile');

Route::get('/teachers/profile',function () {
    return view('teachers.profile.index');
})->name('teachers.profile');
Route::get('/teachers/password/edit',function () {
    return view('teachers.password.index');
})->name('teachers.password.edit');
Route::get('/students/password/edit',function () {
    return view('students.password.index');
})->name('students.password.edit');