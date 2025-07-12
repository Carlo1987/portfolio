<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

use App\Models\User;
use App\Models\Access;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
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
                    Auth::login($user);
                    return redirect()->route('contact.index');
                }
            }

            $limitAccess->value = $limitValue - 1;
            $limitAccess->save();
            return back()->with('error','Error credentials');
        }else{
              return back()->with('error','Blocked');
        }       
    }


    public function welcome()
    {
        $title = "Pannello portfolio";
        $routeForm = "login";
        return $this->viewForm($title, $routeForm);
    }


    public function unloack()
    {
        $title = "Unloack";
        $routeForm = "unloack";
        return $this->viewForm($title, $routeForm);
    }


    private function viewForm($title, $routeForm)
    {
        return view('welcome',[
            'title' => $title,
            'routeForm' => $routeForm,
        ]);
    }


    public function resetAccess(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if($username == env('USERNAMEROOT') && $password == env('PASSWORDROOT')){
            $limitAccess = Access::first();
            $limitAccess->value = env('LIMIT_ACCESS');
            $limitAccess->save();
            return redirect()->route('welcome')->with('success','Unloacked');
        }

        return back()->with('error','Invalid');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
