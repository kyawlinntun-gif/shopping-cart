<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email 
            Auth::attempt(['email' => $username, 'password' => $password]);
        } else {
            //they sent their username instead 
            Auth::attempt(['username' => $username, 'password' => $password]);
        }

        if(Auth::check())
        {
            // if(Session::has('url'))
            // {
            //     $url = Session::get('url');
            //     return redirect("$url");
            // }
            return redirect('/');
        }

        return redirect()->back()->with('fail', 'Please, check your credentials!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
