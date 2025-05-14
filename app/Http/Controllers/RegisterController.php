<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name'=> ['required', 'string','max:255'],
            'email' => ['required', 'email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ]);
        
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        event(new Registered($user)); //Trigger email verification
        //Auth::login($user);
        return response()->json(['message'=>'User registered successfully. Please check your email verification.'])
        //Return redirect()->route('dashboard');
    }
}
