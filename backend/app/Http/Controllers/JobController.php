<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\OrderHelper;
use App\Models\Job;

class JobController extends Controller
{
    use OrderHelper;

    public function index()
    {
        $jobs = Job::orderBy('order','desc')->get();
        return view('admin.pages.jobs.index',[
            'jobs' => $jobs,
        ]);
    }


    public function upsert(Request $request, $id = null)
    {
        $rules_validate = [
            'name' => 'required',
            'order' => 'required',
            'from' => 'required',
            'to' => 'nullable',
            'text_ITA' => 'required',
            'text_ESP' => 'required',
            'text_ENG' => 'required',
        ];

        $error_messages = [
          'name.required' => __('validation.name.required'),
          'order.required' => __('validation.order.required'),
          'from.required' => __('validation.from.required'),
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

        $job;
        $oldOrder = null;
        $newOrder = $request->order;
        if($id){
            $job = Job::find($id);
            $oldOrder = $job->order;
        }else{
            $job = new Job();
        }

        $this->changeOrders(
            Job::class,
            null, 
            $oldOrder, 
            $newOrder
        ); 

        $job->name = $request->name;
        $job->order = $newOrder;
        $job->from = $request->from;
        $job->to = $request->to;
        $job->text_ITA = $request->text_ITA;
        $job->text_ESP = $request->text_ESP;
        $job->text_ENG = $request->text_ENG;
        $job->save();
    
        return response()->json([
            'message' => 'Lavoro salvato',
            'job' => $job
        ], 201);

    }


    public function delete($id)
    {
        $job = Job::find($id);
        if($job){
            $this->changeOrders(
                Job::class,
                null,
                $job->order,
                null,
            );

            $job->delete();
            return response()->json([
                'message' => 'Lavoro eliminato',
            ]);
        }
        return response()->json([
            'errros' => 'Lavoro non trovato',
        ], 404);
    }
}
