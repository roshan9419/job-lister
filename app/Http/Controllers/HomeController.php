<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function listCompanies()
    {
        $companies = Company::all();
        return view('home.companies', ['companies' => $companies]);
    }
}
