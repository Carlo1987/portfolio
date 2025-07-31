<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\OrderHelper;
use App\Models\Text;
use App\Enums\TextEnum;

class TextController extends Controller
{
    use OrderHelper;

    public function index()
    {
        $texts = Text::orderBy('order','desc')->get();
        return view('admin.pages.texts.index',[
            'textsTypes' =>  $this->textsGrouppedByType($texts),
        ]);
    }


    public function upsert(Request $request, $id = null)
    {
        $rules_validate = [
            'type' => 'required',
            'order' => 'required',
            'text_ITA' => 'required',
            'text_ESP' => 'required',
            'text_ENG' => 'required',
        ];

        $error_messages = [
            'type.require' => __('validation.type.required'),
            'order.required' => __('validation.order.required'),
            'text_ITA' => __('validation.text.required', ['lang' => 'italiano']),  
            'text_ESP' => __('validation.text.required', ['lang' => 'spagnolo']),  
            'text_ENG' => __('validation.text.required', ['lang' => 'inglese']), 
        ];

        $validator = Validator::make($request->all(), $rules_validate, $error_messages);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $text;
        $oldOrder = null;
        $newOrder = $request->order;
        if($id){
            $text = Text::find($id);
            $oldOrder = $text->order;
        }else{
            $text =  new Text();
            $text->type = $request->type;
        }

        $this->changeOrders(
            Text::class,
            $request->type, 
            $oldOrder, 
            $newOrder
        ); 
    
        $text->order = $newOrder;
        $text->text_ITA = $request->text_ITA;
        $text->text_ESP = $request->text_ESP;
        $text->text_ENG = $request->text_ENG;
        $text->save();

        return response()->json([
            'message' => 'Testo salvato',
            'text' => $text
        ], 201);
    }


    public function delete($id)
    {
        $text = Text::find($id);
        if($text){
            $this->changeOrders(
                Text::class,
                $text->type,
                $text->order,
                null,
            );

            $text->delete();
            return response()->json([
                'message' => 'Testo eliminato',
            ]);
        }
        return response()->json([
            'errros' => 'Testo non trovata',
        ], 404);
    }


    public function textsApi()
    {
        $texts = Text::whereIn('type', [
            TextEnum::portfolioHome->value,
            TextEnum::portfolioAboutMe->value
        ])
        ->orderBy('order', 'desc')
        ->get();

        $textsHome = $texts->where('type', TextEnum::portfolioHome->value)->values();
        $textsAboutMe = $texts->where('type', TextEnum::portfolioAboutMe->value)->values();

        return response()->json([
            'home' => $textsHome,
            'aboutMe' => $textsAboutMe,
        ]);
    }

}
