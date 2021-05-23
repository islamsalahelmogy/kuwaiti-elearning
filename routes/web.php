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