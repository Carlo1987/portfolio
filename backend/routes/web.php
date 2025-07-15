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
    Route::post('/skill/{id?}', 'App\Http\Controllers\SkillController@store')->name('skill.store');
    Route::delete('/skills/{id}', 'App\Http\Controllers\SkillController@delete')->name('skill.delete');

    //  Rotte corsi
    Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('course.index');
});

