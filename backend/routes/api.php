<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/texts-api','App\Http\Controllers\TextController@textsApi');
Route::get('/skills-api','App\Http\Controllers\SkillController@skillsApi');
Route::post('/sendEmail','App\Http\Controllers\EmailController@send');