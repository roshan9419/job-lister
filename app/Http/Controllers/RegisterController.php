<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function candidate()
    {
        return view('register.candidate');
    }

    public function registerCandidate()
    {
        return redirect('/');
    }
}
