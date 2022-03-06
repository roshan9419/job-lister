<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function dashboard(Request $request)
    {
        $tab = $request->query('tab');
        if (!$tab) $tab = 'profile';

        $company = Company::where('name_slug', '=', 'redbasil')->first();
        $user = User::where('company_id', '=', $company->company_id)->first();
        
        return view('company.dashboard', ['company' => $company, 'user' => $user, 'tab' => $tab]);
    }
}
