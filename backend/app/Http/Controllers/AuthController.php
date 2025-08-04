<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\Access;
use App\Models\Contact;
use App\Mail\SendEmail;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $dateNow;

    public function __construct() {
        $this->dateNow = 'alle ore ' . date('H:i') . ' del ' . date('d/m/Y');
    }

    public function login(Request $request)
    {
        $massageError = 'Invalid credentials';
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $limitAccess = Access::first();
        $limitValue = $limitAccess->value;

        if($limitValue > 0){
            $user = User::where('username',$request->username)->first();

            if($user){
                if(Hash::check( $request->password, $user->password ) ){
                    $limitAccessMax = env('LIMIT_ACCESS');
                    if($limitValue < $limitAccessMax){
                        $limitAccess->value = $limitAccessMax;
                        $limitAccess->save();
                    }
                    Auth::login($user);
                    Log::channel('login')->info('Accesso effettuato ' . $this->dateNow);
                    return redirect()->route('contact.index');
                }
            }

            $limitAccess->value = $limitValue - 1;
            $limitAccess->save();
        }else{
            $massageError = 'BLOCKED';
        }   
        
        Log::channel('login')->warning('Accesso fallito ' . $this->dateNow);
        $this->alertEmail();
        return back()->with('error', $massageError);
    }


    public function welcome()
    {
        $title = "Pannello portfolio";
        $routeName = "login";
        return $this->viewBlade($title, $routeName);
    }


    public function unlock()
    {
        $limitAccess = Access::first();
        if($limitAccess->value > 0){
            return redirect()->route('welcome');
        }
        $title = "Sblocco accesso";
        $routeName = "unlock";
        return $this->viewBlade($title, $routeName);
    }


    private function viewBlade($title, $routeName)
    {
        return view('welcome',[
            'title' => $title,
            'routeName' => $routeName,
        ]);
    }


    public function resetAccess(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if($username == env('UNLOCK_USERNAME') && $password == env('UNLOCK_PASSWORD')){
            $limitAccess = Access::first();
            $limitAccess->value = env('LIMIT_ACCESS');
            $limitAccess->save();
            return redirect()->route('welcome')->with('success','UNLOCKED');
        }

        Log::channel('login')->alert('Accesso fallito ' . $this->dateNow);
        $this->alertEmail();
        return back()->with('error','BLOCKED');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }


    private function alertEmail() :void
    {
        $contacts = Contact::first();
        $data = [
            'sender' => $contacts->email,
            'object' => 'Accesso fallito Portfolio',    
            'text' => 'Accesso fallito al Portfolio '. $this->dateNow,
            'view' => 'emails.alert_email',
        ];
        Mail::to($data['sender'])->send(new SendEmail($data));
    }
}
