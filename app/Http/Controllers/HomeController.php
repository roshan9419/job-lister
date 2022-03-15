<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(5);
        
        $skills = array("Flutter", "Python", "Java", "Dart", "Kotlin", "PHP", "PugJs", "NodeJs", "Flutter", "AngularJs", "Laravel", "Bootstrap", "GCP (Google Cloud Platform)", "Firebase", "RestAPIs", "MySQL", "Adobe Xd");
        
        return view('home.index', ['jobs' => $jobs, 'skills' => $skills]);
    }

    public function listCompanies()
    {
        $companies = Company::all();
        return view('home.companies', ['companies' => $companies]);
    }
}
