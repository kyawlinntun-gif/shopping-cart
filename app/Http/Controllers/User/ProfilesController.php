<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('profiles.index');
    }
}
