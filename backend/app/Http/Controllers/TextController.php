<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::orderBy('order','desc')->get();
        return view('admin.pages.texts.index',[
            'texts' => $texts,
        ]);
    }


    public function upsert()
    {}


    public function delete()
    {}
}
