<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\OrderHelper;
use App\Models\Text;

class TextController extends Controller
{
    use OrderHelper;

    public function index()
    {
        $texts = Text::orderBy('order','desc')->get();
        return view('admin.pages.texts.index',[
            'texts' => $texts,
        ]);
    }


    public function upsert(Request $request, $id = null)
    {}


    public function delete($id)
    {}
}
