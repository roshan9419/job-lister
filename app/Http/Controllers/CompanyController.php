<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function listCompanies()
    {
        $companies = Company::all();
        return view('companies', ['companies' => $companies]);
    }

    public function dashboard(Request $request, $id_or_name_slug)
    {
        $tab = $request->query('tab');
        if (!$tab) $tab = 'profile';

        $company = is_numeric($id_or_name_slug) 
            ? Company::where('company_id', '=', $id_or_name_slug)->first()
            : Company::where('name_slug', '=', $id_or_name_slug)->first();

        $company = Company::where('name_slug', '=', $id_or_name_slug)->first();
        if (!$company) {
            return redirect('404');
        }

        $user = User::where('company_id', '=', $company->company_id)->first();
        if (!$user) {
            return redirect('404');
        }
        
        return view('company.dashboard', ['company' => $company, 'user' => $user, 'tab' => $tab]);
    }
}
