<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = "Pannello portfolio";
    $routeForm = "login";
    return view('welcome',[
        'title' => $title,
        'routeForm' => $routeForm,
    ]);
})->name('welcome');

$url_unloack = env('URL_UNLOACK');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get("/$url_unloack", 'App\Http\Controllers\AuthController@unloack')->name('unloack');
Route::post("/$url_unloack", 'App\Http\Controllers\AuthController@resetAccess')->name('unloack');

Route::group(['middleware' => 'auth'], function () {
    //  Rotte contatti 
    Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact.index');
});

