<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function form()
    {
        return view('candidate.register');
    }

    public function register(Request $request)
    {
        // register candidate
    }
}
