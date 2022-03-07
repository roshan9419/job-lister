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

    public function company()
    {
        return view('register.company');
    }

    public function registerCompany(Request $request)
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

    public function candidate()
    {
        return view('register.candidate');
    }

    public function registerCandidate()
    {
        return redirect('/');
    }
}
