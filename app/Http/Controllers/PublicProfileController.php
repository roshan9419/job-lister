<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function company($name_slug)
    {
        $company = Company::where('name_slug', $name_slug)->first();
        if(!$company) {
            return redirect(404);
        }

        $recentJobs = Job::where('company_id', $company->company_id)->latest()->paginate(5);

        return view('profiles.company', ['company' => $company, 'recentJobs' => $recentJobs]);
    }
}
