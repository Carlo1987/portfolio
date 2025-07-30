<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//  Rotta invio email
Route::post('/sendEmail','App\Http\Controllers\EmailController@send');