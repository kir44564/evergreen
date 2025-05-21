<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('login',function(){
    return view('login');
});

Route::post('login', [LoginController::class])->name('login.attempt');

Route::middleware('auth.api', 'verified')->group(function (){

        //Logout
        Route::post('logout', function() {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    })->name('logout');
});

//Registration
Route::view('register', 'register')->name('register');
Route::post('register', [RegisterController::class])->name('register.store');

Route::get('/auth/verify-email/{id}/{hash}', function ($id, $hash, Request $request) {
        // Find user by ID
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }
    
        // Verify if the hash is correct
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link.'], 403);
        }
    
        // Mark email as verified
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        return response()->json(['message' => 'Email verified successfully!']);
    })->middleware('signed')->name('verification.verify');

Route::get('/auth/verify-email/{id}/{hash}', function($id, $hash, Request $request){
    //Find user ID
    $user = User::find($id);

    if(!$user){
        return response()->json(['message'=>'User not found.'], 404);
    }

    //Verify if the ahsh is correct
    if(!hash_equals((string)$hash, sha1($user->getEmailForVerification()))){
        return response()->json(['message'=>'Invalid verification link.'], 403);
    }

    //Mark email as verified
    if(!$user->hasVerifiedEmail()){
        $user->markEmailAsVerified();
    }

    return response()->json(['message'=>'Email verified!']);
})->middleware('signed')->name('verification.verify');

//resend Email
Route::post('/auth/resend-verification', function(Request $request){
    $user = User::where('email', $request->email)->first();

    if (!$user){
        return response()->json(['message'=>'User not found.'], 404);
    }

    if ($user->hasVerifiedEmail()){
        return response()->json(['message'=>'Email already verified.'], 400);
    }

    $user->sendEmailVerificationNotification();
    return response()->json(['message'=>'Verification link resent!']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        if (Auth::viaRemember()) {
            // User was authenticated via "Remember Me"
            return view('dashboard')->with('message', 'Welcome back! You were remembered.');
        }

        return view('dashboard');
    })->name('dashboard');
});