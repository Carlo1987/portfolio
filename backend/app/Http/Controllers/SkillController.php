<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->get();
        $skillsTypes = $this->groupByType($skills);
   
        return view('admin.pages.skills.index', [
            'skillsTypes' => $skillsTypes
        ]);
    }

     private function groupByType($skills)
    {
        $skillTypes =  config('setting.skillTypes');
        $frontendTypeId = $skillTypes['frontend']['id'];
        $backendTypeId = $skillTypes['backend']['id'];
        $databaseTypeId = $skillTypes['database']['id'];
        $devopsTypeId = $skillTypes['devops']['id'];

        $frontendSkills = [];
        $backendSkills = [];
        $databaseSkills = [];
        $devopsSkills = [];

        foreach($skills as $skill){
            if($skill['skillType'] == $frontendTypeId){
                $frontendSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $backendTypeId){
                $backendSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $databaseTypeId){
                $databaseSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $devopsTypeId){
                $devopsSkills[] = $skill->toArray();
            }
        }

        return array(
            [
                'id' => $frontendTypeId,
                'name' => $skillTypes['frontend']['name'],
                'list' => $frontendSkills,
            ],
            [
                'id' => $backendTypeId,
                'name' => $skillTypes['backend']['name'],
                'list' => $backendSkills,
            ],
            [
                'id' => $databaseTypeId,
                'name' => $skillTypes['database']['name'],
                'list' => $databaseSkills,
            ],
            [
                'id' => $devopsTypeId,
                'name' => $skillTypes['devops']['name'],
                'list' => $devopsSkills,
            ],
        );
    }
}
