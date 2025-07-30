<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

use App\Models\Email;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        try{
            $object = $request->object;
            $text = $request->text;
            $sender = $request->sender;

            Mail::to($sender)->send(new SendEmail($sender, $object, $text));

            $email = new Email();
            $email->sender = $sender;
            $email->object = $object;
            $email->text = $text;
            $email->save();

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
