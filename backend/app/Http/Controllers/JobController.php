<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('order','desc')->get();
        return view('admin.pages.jobs.index',[
            'jobs' => $jobs,
        ]);
    }


    public function upsert()
    {}


    public function delete()
    {}
}
