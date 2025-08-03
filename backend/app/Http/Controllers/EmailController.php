<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function clientEmail(Request $request)
    {
        try{
             $rules_validate = [
                'object' => 'required',
                'sender' => 'required|email',
                'text' => 'required',
            ];

            $error_messages = [
                'object.require' => 'empty field',
                'text.required' => 'empty field',
                'sender.required' => 'empty field',
                'sender.email' => 'email not valid',
            ];

            $validator = Validator::make($request->all(), $rules_validate, $error_messages);
            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = [
                'sender' => $request->sender,
                'object' => $request->object,    
                'text' => $request->text,
                'view' => 'emails.client_email',
            ];
            Mail::to($data['sender'])->send(new SendEmail($data));

            return response()->json([
                'message' => 'Email inviata con successo!',
                'status' => 'success',
            ]);

        }catch (\Throwable $e) {
            return response()->json([
                'message' => 'Errore durante l\'invio della mail: ' . $e->getMessage(),
                'status' => 'error',
            ], 500);
        }

    }
}
