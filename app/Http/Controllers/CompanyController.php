<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{

    public function form()
    {
        return view('company.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'website' => 'required',
            'country' => 'required',
            'state' => 'required',
            'about' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1028'
        ]);
        
        // Check if there is same company already created
        $company = Company::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
        if ($company) {
            return back()->with('fail', $request->name.' company is already registered.');
        }
        
        $company = new Company();
        $company->name = Str::ucfirst($request->name);
        $company->email = $request->email;
        $company->website = $request->website;
        $company->country = $request->country;
        $company->state = $request->state;
        $company->about = $request->about;
        $company->name_slug = Str::slug($request->name);
        
        $res = $company->save();

        $destination_path = 'public/images/companies/';
        $image_name = Str::slug($request->name).'.jpg';//.$request->image->extension();
        $path = $request->file('image')->storeAs($destination_path, $image_name);
        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
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
