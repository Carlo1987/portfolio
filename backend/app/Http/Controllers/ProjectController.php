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
        $projects = Project::orderBy('order','desc')->get();
        $skills = Skill::select('id', 'name')->get()->toArray();
        return view('admin.pages.projects.index',[
            'projects' => $projects,
            'skills' => $skills,
        ]);
    }


    public function store(Request $request, $id)
    {}


    public function delete($id)
    {}
}
