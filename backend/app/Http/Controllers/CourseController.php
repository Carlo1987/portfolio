<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('order', 'desc')->get();
        return view('admin.pages.courses.index',[
            'courses' => $courses
        ]);
    }


    public function store(Request $request, $id = null)
    {
        return response()->json([
            'result' => $request->all()
        ]);
    }


    public function delete($id)
    {}
}
