<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Helpers\FileHelper;
use App\Http\Helpers\OrderHelper;
use App\Http\Helpers\ProjectHelper;
use App\Enums\ProjectEnum;
use App\Models\Project;
use App\Models\Skill;

class ProjectController extends Controller
{
    use FileHelper, OrderHelper, ProjectHelper;

    public function index()
    {
        $skills = Skill::select('id', 'name','image','type')->orderBy('order','desc')->get();
   
        $projects = Project::orderBy('order','desc')->get();
        foreach($projects as $project){
            $project['skills'] =  $this->projectSkillsData($project->dev_languages, $skills);
        }
    
        return view('admin.pages.projects.index',[
            'projects' => $projects,
            'skillsTypes' => $this->skillsGrouppedByType($skills),
        ]);
    }


  


    public function upsert(Request $request, $id = null)
    {
        $rules_validate = [
            'name' => 'required',
            'order' => 'required',
            'url' => 'required',
            'dev_languages' => 'required',
            'status' => 'required',
            'description_ITA' => 'required',
            'description_ESP' => 'required',
            'description_ENG' => 'required',
            'curriculum_ITA' => 'required',
            'curriculum_ESP' => 'required',
            'curriculum_ENG' => 'required',
            'file' =>  'mimes:jpeg,jpg,png,gif,webp',
        ];

        $error_messages = [
            'name.required' => __('validation.name.required'),
            'order.required' => __('validation.order.required'),
            'url.required' => __('validation.url.required'),
            'dev_languages.required' => __('validation.dev_languages.required'),
            'status.required' => __('validation.status.required'),
            'description_ITA' => __('validation.text.required', ['lang' => 'portfolio ITA']),
            'description_ESP' => __('validation.text.required', ['lang' => 'portfolio ESP']),
            'description_ENG' => __('validation.text.required', ['lang' => 'portfolio ENG']),
            'curriculum_ITA' => __('validation.text.required', ['lang' => 'curriculum ITA']),
            'curriculum_ESP' => __('validation.text.required', ['lang' => 'curriculum ESP']),
            'curriculum_ENG' => __('validation.text.required', ['lang' => 'curriculum ENG']),
            'file.mimes' => __('validation.file.mime'),
        ];

        $validator = Validator::make($request->all(), $rules_validate, $error_messages);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $project;
        $oldOrder = null;
        $newOrder = $request->order;
        $requiredImage = false;
        if($id){
            $project = Project::find($id);
            $oldOrder = $project->order;
        }else{
            $project =  new Project();
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
            $path = 'projects';
            if($project->image){
               $this->deleteFile($project->image, $path);
            }

            $file = $request->file('file');
            $fileNameSaved = $this->saveFile($file, $path);
            $project->image = $fileNameSaved;
        } 

        $this->changeOrders(
            Project::class,
            null, 
            $oldOrder, 
            $newOrder
        ); 
    
        $project->name = $request->name;
        $project->order = $newOrder;
        $project->url = $request->url;
        $project->dev_languages = $request->dev_languages;
        $project->status = $request->status;
        $project->description_ITA = $request->description_ITA;
        $project->description_ESP = $request->description_ESP;
        $project->description_ENG = $request->description_ENG;
        $project->curriculum_ITA = $request->curriculum_ITA;
        $project->curriculum_ESP = $request->curriculum_ESP;
        $project->curriculum_ENG = $request->curriculum_ENG;
        $project->save();

        return response()->json([
            'message' => 'Progetto salvato',
            'project' => $project
        ], 201);
    }


    public function delete($id)
    {
        $project = Project::find($id);
        if($project){
            $this->deleteFile($project->image, 'projects');

            $this->changeOrders(
                Project::class,
                null,
                $project->order,
                null,
            );

            $project->delete();
            return response()->json([
                'message' => 'Progetto eliminato',
            ]);
        }
        return response()->json([
            'errros' => 'Progetto non trovato',
        ], 404);
    }


    public function projectsApi()
    {
        $skills = Skill::select('id', 'name','image','type')->orderBy('order','desc')->get();
   
        $projects = Project::where('status', ProjectEnum::Working)->orderBy('order','desc')->get();
        foreach($projects as $project){
            $project['skills'] =  $this->projectSkillsData($project->dev_languages, $skills, true);
        }
        return response()->json($projects);
    }
}
