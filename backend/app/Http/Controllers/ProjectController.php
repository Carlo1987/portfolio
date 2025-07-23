<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Helpers\FileHelper;
use App\Http\Helpers\OrderHelper;
use App\Models\Project;
use App\Models\Skill;

class ProjectController extends Controller
{
    use FileHelper, OrderHelper;

    public function index()
    {
        $skills = Skill::select('id', 'name','image','type')->orderBy('order','desc')->get();
        $skillsTypes = $this->skillsGrouppedByType($skills);

        $projects = Project::orderBy('order','desc')->get();
        foreach($projects as $project){
            $project['skills'] =  $project->getSkillsName($skills);
        }
       
        return view('admin.pages.projects.index',[
            'projects' => $projects,
            'skillsTypes' => $skillsTypes,
        ]);
    }


    public function store(Request $request, $id)
    {
        return response()->json([
            'result' => $request->all()
        ]);
    }


    public function delete($id)
    {}
}
