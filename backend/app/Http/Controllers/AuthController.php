<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username',$request->username)->first();

        if($user){
            if(Hash::check( $request->password, $user->password ) ){
                dd('ok');
            }
        }
        
        return back()->with('error','Error credentials');
    }
}
