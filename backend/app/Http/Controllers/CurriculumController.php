<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Skill;
use App\Models\Course;
use App\Models\Project;
use App\Models\Contact;

class CurriculumController extends Controller
{
    public function index()
    {
        return view('admin.pages.curriculum.index');
    }

    
    public function show($lang)
    {
        $contacts = Contacts::first();
        $skills = Skill::orderBy('order', 'desc')->get();
        $courses = Course::orderBy('order', 'desc')->get();

        $projects = Project::orderBy('order','desc')->get();
        foreach($projects as $project){
            $project['skills'] =  $project->getSkillsName($skills);
        }

        $pdf = Pdf::loadView('admin.pages.curriculum.curriculum', [
            'lang' => $lang,
            'langDB' => $this->langDB($lang),
            'contacts' => $contacts->formatFormContacts(),
            'skillsTypes' => $this->skillsGrouppedByType($skills),
            'courses' => $courses,
            'projects' => $projects,
        ]);   
        return $pdf->stream();  
    }


    private function langDB($lang)
    {
        $language = 'ITA';
        if($lang == 'es'){
            $language = 'ESP';
        }
        if($lang == 'en'){
            $language = 'ENG';
        }
        return $language;
    }
}
