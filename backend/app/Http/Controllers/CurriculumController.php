<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Helpers\OrderHelper;
use App\Http\Helpers\TimeHelper;
use App\Http\Helpers\ProjectHelper;
use App\Enums\TextEnum;
use App\Enums\ProjectEnum;

use App\Models\Contact;
use App\Models\Skill;
use App\Models\Text;
use App\Models\Job;
use App\Models\Course;
use App\Models\Project;
use App\Models\Language;


class CurriculumController extends Controller
{
    use OrderHelper, TimeHelper, ProjectHelper;

    public function index()
    {
        return view('admin.pages.curriculum.index');
    }


    private function createPDF($lang)
    {
        $contacts = Contact::first();
        $skills = Skill::orderBy('order', 'desc')->get();
        $jobs = Job::orderBy('order', 'desc')->get()->map(function ($job) use ($lang) {
            $job->time = $this->jobTime($job->from, $job->to, $lang);
            return $job;
        })->toArray();
        $courses = Course::orderBy('order', 'desc')->get()->map(function ($course) use ($lang){
            $course->time = $this->courseTime($course, $lang);
            return $course;
        })->toArray();
        $languages = Language::all()->toArray();
        $texts = Text::where('type',TextEnum::curriculumPresentacion)
                        ->orWhere('type',TextEnum::curriculumSignature)
                        ->orderBy('order','desc')
                        ->get();

        $projects = Project::where('status', ProjectEnum::Working)->orderBy('order','desc')->get();
        foreach($projects as $project){
            $project['skills'] =  $this->projectSkillsData($project->dev_languages, $skills);
        }

        
        return Pdf::loadView('admin.pages.curriculum.curriculum', [
            'lang' => $lang,
            'langDB' => $this->langDB($lang),
            'contacts' => $contacts->formatBladeContacts(),
            'texts' => $this->textsGrouppedByType($texts),
            'skillsTypes' => $this->skillsGrouppedByType($skills),
            'jobs' => $jobs,
            'courses' => $courses,
            'projects' => $projects,
            'languages' => $languages,
        ]);
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

    
    public function show($lang)
    {
        $pdf = $this->createPDF($lang);   
        return $pdf->stream();     
    }



    public function download($lang)
    {
        $pdf = $this->createPDF($lang); 
        return $pdf->download("curriculum_Loi_Carlo_$lang.pdf");
    }

}
