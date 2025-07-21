<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Helpers\FileHelper;
use App\Http\Helpers\OrderHelper;
use App\Models\Skill;

class SkillController extends Controller
{
    use FileHelper, OrderHelper;

    public function index()
    {
        $skills = Skill::orderBy('order', 'desc')->get();
        $skillsTypes = $this->skillsGrouppedByType($skills);
   
        return view('admin.pages.skills.index', [
            'skillsTypes' => $skillsTypes
        ]);
    }



    public function store(Request $request, $id = null)
    {       
        $rules_validate = [
            'type' => 'required',
            'name' => 'required',
            'order' => 'required',
            'file' =>  'mimes:jpeg,jpg,png,gif,webp',
        ];

        $error_messages = [
            'type.require' => __('validation.type.required'),
            'name.required' => __('validation.name.required'),
            'order.required' => __('validation.order.required'),
            'file.mimes' => __('validation.file.mime'),
        ];

        $validator = Validator::make($request->all(), $rules_validate, $error_messages);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $skill;
        $oldOrder = null;
        $newOrder = $request->order;
        $requiredImage = false;
        if($id){
            $skill = Skill::find($id);
            $oldOrder = $skill->order;
        }else{
            $skill =  new Skill();
            $skill->type = $request->type;
            $requiredImage = true;
        }

        if($requiredImage && !$request->has('file')){
            return response()->json([
                'errors' => [
                    'file' => __('validation.file.required'),
                ],
            ], 422);
        }

        if($request->has('file')){
            $path = 'skills';
            if($skill->image){
               $this->deleteFile($skill->image, $path);
            }

            $file = $request->file('file');
            $fileNameSaved = $this->saveFile($file, $path);
            $skill->image = $fileNameSaved;
        } 

        $this->changeOrders(
            Skill::class,
            $request->type, 
            $oldOrder, 
            $newOrder
        ); 
    
        $skill->name = $request->name;
        $skill->order = $newOrder;
        $skill->save();

        return response()->json([
            'message' => 'Skill salvata',
            'skill' => $skill
        ], 201);
    }


    public function delete($id)
    {
        $skill = Skill::find($id);
        if($skill){
            $this->deleteFile($skill->image, 'skills');

            $this->changeOrders(
                Skill::class,
                $skill->type,
                $skill->order,
                null,
            );

            $skill->delete();
            return response()->json([
                'message' => 'Skill eliminata',
            ]);
        }
        return response()->json([
            'errros' => 'Skill non trovata',
        ], 404);
    }

}
