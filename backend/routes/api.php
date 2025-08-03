<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/contacts-api','App\Http\Controllers\ContactController@contactsApi');
Route::get('/texts-api','App\Http\Controllers\TextController@textsApi');
Route::get('/skills-api','App\Http\Controllers\SkillController@skillsApi');
Route::get('/projects-api','App\Http\Controllers\ProjectController@projectsApi');
Route::post('/client-email','App\Http\Controllers\EmailController@clientEmail');

$curriculumUrlDwnld = env('CURRICULUM_URL_DWNLD');
Route::get("/$curriculumUrlDwnld/{lang}",'App\Http\Controllers\CurriculumController@download');