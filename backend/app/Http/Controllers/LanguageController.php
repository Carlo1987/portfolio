<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\LanguageEnum;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.pages.languages.index',[
            'languages' => $languages,
        ]);
    }


    public function edit(Request $request)
    {
        $language_ITA = Language::where('id', LanguageEnum::italian)->first(); 
        $language_ESP = Language::where('id', LanguageEnum::spanish)->first(); 
        $language_ENG = Language::where('id', LanguageEnum::english)->first(); 

        $language_ITA->value = $request->input('value_' . LanguageEnum::italian);
        $language_ESP->value = $request->input('value_' . LanguageEnum::spanish);
        $language_ENG->value = $request->input('value_' . LanguageEnum::english);

        $language_ITA->save();
        $language_ESP->save();
        $language_ENG->save();

        return back()->with('success','Lingue salvate');
    }
}
