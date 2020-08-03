<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|alpha_dash|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create(['name' => $request->name, 'username' => $request->username, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        Auth::login($user);
        
        return redirect('/');
    }
}
