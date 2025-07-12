<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\AuthController@welcome')->name('welcome');
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
    Route::get('/skills', 'App\Http\Controllers\SkillController@index')->name('skill.index');
});

