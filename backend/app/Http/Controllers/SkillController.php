<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Helpers\FileHelper;
use App\Models\Skill;

class SkillController extends Controller
{
    use FileHelper;

    public function index()
    {
        $skills = Skill::orderBy('order', 'desc')->get();
        $skillsTypes = $this->groupByType($skills);
   
        return view('admin.pages.skills.index', [
            'skillsTypes' => $skillsTypes
        ]);
    }

    private function groupByType($skills)
    {
        $types =  config('setting.skillTypes');
        $frontendTypeId = $types['frontend']['id'];
        $backendTypeId = $types['backend']['id'];
        $databaseTypeId = $types['database']['id'];
        $devopsTypeId = $types['devops']['id'];

        $frontendSkills = [];
        $backendSkills = [];
        $databaseSkills = [];
        $devopsSkills = [];

        foreach($skills as $skill){
            if($skill['type'] == $frontendTypeId){
                $frontendSkills[] = $skill->toArray();

            }else if($skill['type'] == $backendTypeId){
                $backendSkills[] = $skill->toArray();

            }else if($skill['type'] == $databaseTypeId){
                $databaseSkills[] = $skill->toArray();

            }else if($skill['type'] == $devopsTypeId){
                $devopsSkills[] = $skill->toArray();
            }
        }

        return array(
            [
                'id' => $frontendTypeId,
                'name' => $types['frontend']['name'],
                'list' => $frontendSkills,
            ],
            [
                'id' => $backendTypeId,
                'name' => $types['backend']['name'],
                'list' => $backendSkills,
            ],
            [
                'id' => $databaseTypeId,
                'name' => $types['database']['name'],
                'list' => $databaseSkills,
            ],
            [
                'id' => $devopsTypeId,
                'name' => $types['devops']['name'],
                'list' => $devopsSkills,
            ],
        );
    }


    public function store(Request $request, $id = null)
    {       
        $rules_validate = [
            'type' => 'required',
            'name' => 'required|string',
            'order' => 'required|integer',
            'file' =>  'mimes:jpeg,jpg,png,gif,webp',
        ];

        $error_messages = [
          'name.required' => 'Nome obbligatorio',
          'order.required' => 'Numero ordine obbligatorio',
          'file.mimes' => 'Formato file non valido',  
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
                    'file' => "Immagine obbligatoria",
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
