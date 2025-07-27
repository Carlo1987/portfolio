<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Helpers\OrderHelper;
use App\Models\Course;

class CourseController extends Controller
{
    use OrderHelper;

    public function index()
    {
        $courses = Course::orderBy('order', 'desc')->get();
        return view('admin.pages.courses.index',[
            'courses' => $courses
        ]);
    }


    public function upsert(Request $request, $id = null)
    {
          $rules_validate = [
            'name' => 'required',
            'order' => 'required',
            'timeDuration' => 'required',
            'format' => 'required',
            'date' => 'required',
            'text_ITA' => 'required',
            'text_ESP' => 'required',
            'text_ENG' => 'required',
        ];

        $error_messages = [
          'name.required' => __('validation.name.required'),
          'order.required' => __('validation.order.required'),
          'timeDuration.required' => __('validation.timeDuration.required'),
          'format.required' => __('validation.format.required'),
          'date.required' => __('validation.date.required'),
          'text_ITA' => __('validation.text.required', ['lang' => 'italiano']),  
          'text_ESP' => __('validation.text.required', ['lang' => 'spagnolo']),  
          'text_ENG' => __('validation.text.required', ['lang' => 'inglese']),  
        ];

        $validator = Validator::make($request->all(), $rules_validate, $error_messages);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $course;
        $oldOrder = null;
        $newOrder = $request->order;
        if($id){
            $course = Course::find($id);
            $oldOrder = $course->order;
        }else{
            $course = new Course();
        }

        $this->changeOrders(
            Course::class,
            null, 
            $oldOrder, 
            $newOrder
        ); 

        $course->name = $request->name;
        $course->order = $newOrder;
        $course->timeDuration = $request->timeDuration;
        $course->format = $request->format;
        $course->date = $request->date;
        $course->text_ITA = $request->text_ITA;
        $course->text_ESP = $request->text_ESP;
        $course->text_ENG = $request->text_ENG;
        $course->save();
    
        return response()->json([
            'message' => 'Corso salvato',
            'course' => $course
        ], 201);
    }


    public function delete($id)
    {
        $course = Course::find($id);
        if($course){
            $this->changeOrders(
                Course::class,
                null,
                $course->order,
                null,
            );

            $course->delete();
            return response()->json([
                'message' => 'Corso eliminato',
            ]);
        }
        return response()->json([
            'errros' => 'Corso non trovato',
        ], 404);
    }
}
