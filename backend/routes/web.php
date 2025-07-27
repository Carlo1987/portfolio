<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\noAuth;

Route::get('/', 'App\Http\Controllers\AuthController@welcome')->name('welcome')->middleware(noAuth::class);
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');

$url_unloack = env('URL_UNLOACK');
Route::get("/$url_unloack", 'App\Http\Controllers\AuthController@unloack')->name('unloack');
Route::post("/$url_unloack", 'App\Http\Controllers\AuthController@resetAccess')->name('unloack');


Route::group(['middleware' => 'auth'], function () {
    //  Rotte contatti 
    Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::put('/contacts', 'App\Http\Controllers\ContactController@edit')->name('contact.edit');

    //  Rotte skills
    Route::get('/skills-list', 'App\Http\Controllers\SkillController@index')->name('skill.index');
    Route::post('/skill/{id?}', 'App\Http\Controllers\SkillController@upsert')->name('skill.upsert');
    Route::delete('/skills/{id}', 'App\Http\Controllers\SkillController@delete')->name('skill.delete');

    //  Rotte corsi
    Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('course.index');
    Route::post('/courses/{id?}', 'App\Http\Controllers\CourseController@upsert')->name('course.upsert');
    Route::delete('/courses/{id}', 'App\Http\Controllers\CourseController@delete')->name('course.delete');

    //  Rotte progetti
    Route::get('/projects', 'App\Http\Controllers\ProjectController@index')->name('project.index');
    Route::post('/projects/{id?}', 'App\Http\Controllers\ProjectController@upsert')->name('project.upsert');
    Route::delete('/projects/{id}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');

    //  Rotte testi
    Route::get('/texts', 'App\Http\Controllers\TextController@index')->name('text.index');
    Route::post('/texts/{id?}', 'App\Http\Controllers\TextController@upsert')->name('text.upsert');
    Route::delete('/texts/{id}', 'App\Http\Controllers\TextController@delete')->name('text.delete');

    //  Rotte lavori
    Route::get('/jobs', 'App\Http\Controllers\JobController@index')->name('job.index');
    Route::post('/jobs/{id?}', 'App\Http\Controllers\JobController@upsert')->name('job.upsert');
    Route::delete('/jobs/{id}', 'App\Http\Controllers\JobController@delete')->name('job.delete');

    //  Rotte linguaggi
    Route::get('/languages', 'App\Http\Controllers\LanguageController@index')->name('language.index');
    Route::put('/languages/{id?}', 'App\Http\Controllers\LanguageController@edit')->name('language.edit');

    //  Rotte curriculum
    Route::get('/curriculums', 'App\Http\Controllers\CurriculumController@index')->name('curriculum.index');
    Route::get('/curriculum/{lang}', 'App\Http\Controllers\CurriculumController@show')->name('curriculum.show');
});

