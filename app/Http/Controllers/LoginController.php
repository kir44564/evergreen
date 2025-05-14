<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember =$request->has('remember');
 
        if (Auth::attempt($credentials,$remember)) {
            if(!Auth::user()->hasVerifiedEmail()){
                Auth::logout();
                return redirect()->route('login')->withErrors(['email'=>'Please verify your email before logging in. ']);
            }
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
