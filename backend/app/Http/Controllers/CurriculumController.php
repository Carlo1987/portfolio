<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CurriculumController extends Controller
{
    public function index()
    {
        return view('admin.pages.curriculum.index');
    }

    
    public function show($lang)
    {
        $pdf = Pdf::loadView('admin.pages.curriculum.curriculum', [
            'lang' => $lang,
        ]);   
        return $pdf->stream();  
    }
}
