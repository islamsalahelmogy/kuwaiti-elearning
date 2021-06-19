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



Route::middleware('auth')->group(function () {
        //home
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/home/topics','HomeController@topics')->name('home.topics');
    Route::get('/home/topics/teachers','HomeController@teachers')->name('home.teachers');
    Route::get('/home/topics/teachers/contents','HomeController@contents')->name('home.contents');
    Route::get('/home/topics/teachers/contents/videos','HomeController@storiesAndVideos')->name('home.videos');
    Route::get('/home/topics/teachers/contents/videos/video/{id}','HomeController@showvideo')->name('home.videos.show');
    Route::get('/home/topics/teachers/contents/stories','HomeController@storiesAndVideos')->name('home.stories');
    Route::get('/home/topics/teachers/contents/stories/story/{id}','HomeController@showstory')->name('home.stories.show');
    Route::get('/home/topics/teachers/contents/activites','HomeController@activities')->name('home.activities');
    Route::get('/home/topics/teachers/contents/activites/activity/{id}','HomeController@showactivity')->name('home.activities.show');
    Route::post('/home/topics/teachers/contents/activites/activity/{id}/setresult','HomeController@setResult')->name('home.activities.show.setResult');
    Route::get('/home/topics/teachers/contents/activites/activity/{id}/results','HomeController@results')->name('home.activities.show.results');

        //teachers
    Route::get('/teacherslevels','TeachersController@index')->name('teacherslevels');
    Route::get('/teacherslevels/teachers','TeachersController@teachers')->name('teachers');
    Route::get('/teacherslevels/teachers/topics','TeachersController@topics')->name('teachers.topics');
    Route::get('/teacherslevels/teachers/topics/contents','TeachersController@contents')->name('teachers.contents');
    Route::get('/teacherslevels/teachers/topics/contents/videos','TeachersController@storiesAndVideos')->name('teachers.videos');
    Route::get('/teacherslevels/teachers/topics/contents/videos/video/{id}','TeachersController@showvideo')->name('teachers.videos.show');
    Route::get('/teacherslevels/teachers/topics/contents/stories','TeachersController@storiesAndVideos')->name('teachers.stories');
    Route::get('/teacherslevels/teachers/topics/contents/stories/story/{id}','TeachersController@showstory')->name('teachers.stories.show');
    Route::get('/teacherslevels/teachers/topics/contents/activites','TeachersController@activities')->name('teachers.activities');
    Route::get('/teacherslevels/teachers/topics/contents/activites/activity/{id}','TeachersController@showactivity')->name('teachers.activities.show');
    Route::post('/teacherslevels/teachers/topics/contents/activites/activity/{id}/setresult','TeachersController@setResult')->name('teachers.activities.show.setResult');
    Route::get('/teacherslevels/teachers/topics/contents/activites/activity/{id}/results','TeachersController@results')->name('teachers.activities.show.results');

        //videos
    Route::get('/videos','VideosController@index')->name('videos');
    Route::get('/videos/topics','VideosController@topics')->name('videos.topics');
    Route::get('/videos/topics/teachers','VideosController@teachers')->name('videos.teachers');
    Route::get('/videos/topics/teachers/allvideos','VideosController@videos')->name('videos.all');
    Route::get('/videos/topics/teachers/allvideos/video/{id}','VideosController@showvideo')->name('videos.all.show');


        //stories
    Route::get('/stories','StoriesController@index')->name('stories');
    Route::get('/stories/topics','StoriesController@topics')->name('stories.topics');
    Route::get('/stories/topics/teachers','StoriesController@teachers')->name('stories.teachers');
    Route::get('/stories/topics/teachers/allstories','StoriesController@stories')->name('stories.all');
    Route::get('/stories/topics/teachers/allstories/story/{id}','StoriesController@showstory')->name('stories.all.show');

        //activities
    Route::get('/activities','ActivityController@index')->name('activities');
    Route::get('/activities/topics','ActivityController@topics')->name('activities.topics');
    Route::get('/activities/topics/teachers','ActivityController@teachers')->name('activities.teachers');
    Route::get('/activities/topics/teachers/allactivities','ActivityController@activities')->name('activities.all');
    Route::get('/activities/topics/teachers/allactivities/activity/{id}','ActivityController@showactivity')->name('activities.all.show');
    Route::post('/activities/topics/teachers/allactivities/activity/{id}/setresult','ActivityController@setResult')->name('activities.all.show.setResult');
    Route::get('/activities/topics/teachers/allactivities/activity/{id}/results','ActivityController@results')->name('activities.all.show.results');


});
    //topic routes

    Route::get('/admin/topic/create', 'TopicController@create')->name('topic.create')->middleware('isadmin:teacher');
    Route::post('/admin/topic/store', 'TopicController@store')->name('topic.store')->middleware('isadmin:teacher');
    Route::get('/admin/topic/index','TopicController@index')->name('topic.index')->middleware('isadmin:teacher');
    Route::get('/admin/topic/edit/{id}', 'TopicController@edit')->name('topic.edit')->middleware('isadmin:teacher');
    Route::post('/admin/topic/update/{id}', 'TopicController@update')->name('topic.update')->middleware('isadmin:teacher');
    Route::get('/admin/topic/delete/{id}', 'TopicController@destroy')->name('topic.delete')->middleware('isadmin:teacher');



    //level routes

    Route::get('/admin/level/create', 'LevelController@create')->name('level.create')->middleware('isadmin:teacher');
    Route::post('/admin/level/store', 'LevelController@store')->name('level.store')->middleware('isadmin:teacher');
    Route::get('/admin/level/index','LevelController@index')->name('level.index')->middleware('isadmin:teacher');
    Route::get('/admin/level/edit/{id}', 'LevelController@edit')->name('level.edit')->middleware('isadmin:teacher');
    Route::post('/admin/level/update/{id}', 'LevelController@update')->name('level.update')->middleware('isadmin:teacher');
    Route::get('/admin/level/delete/{id}', 'LevelController@destroy')->name('level.delete')->middleware('isadmin:teacher');
    
    //test routes
    Route::get('/admin/test/create', 'TestController@create')->name('test.create')->middleware('isadmin:teacher');
    Route::post('/admin/test/store', 'TestController@store')->name('test.store')->middleware('isadmin:teacher');
    Route::get('/admin/test/index','TestController@index')->name('test.index')->middleware('isadmin:teacher');
    Route::get('/admin/test/edit/{id}', 'TestController@edit')->name('test.edit')->middleware('isadmin:teacher');
    Route::post('/admin/test/update/{id}', 'TestController@update')->name('test.update')->middleware('isadmin:teacher');
    Route::get('/admin/test/delete/{id}', 'TestController@destroy')->name('test.delete')->middleware('isadmin:teacher');
    Route::get('/admin/test/result/{id}', 'TestController@result')->name('test.result')->middleware('isadmin:teacher');

    //questions crud routes
    Route::get('/admin/question/create/{id}', 'QuestionController@create')->name('question.create')->middleware('isadmin:teacher');
    Route::post('/admin/question/store/{id}', 'QuestionController@store')->name('question.store')->middleware('isadmin:teacher');
    Route::get('/admin/question/index/{id}','QuestionController@index')->name('question.index')->middleware('isadmin:teacher');
    Route::get('/admin/question/edit/{id}', 'QuestionController@edit')->name('question.edit')->middleware('isadmin:teacher');
    Route::post('/admin/question/update/{id}', 'QuestionController@update')->name('question.update')->middleware('isadmin:teacher');
    Route::get('/admin/question/delete/{id}', 'QuestionController@destroy')->name('question.delete')->middleware('isadmin:teacher');




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
