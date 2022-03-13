<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class CompanyController extends Controller
{

    public function form()
    {
        return view('company.register');
    }

    public function register(Request $request)
    {
        $user_id = Session::get('user')->user_id;
        // $user = User::where('user_id', $user_id)->id)->first();
        if (!$user_id) {
            return redirect(route('auth.login'));
        }

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
            $user = User::where('user_id', $user_id)->first();
            $user->company_id = $company->company_id;
            $user->save();
            // udpate user object in session
            Session::put('user', $user);
            
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function dashboard(Request $request)
    {
        $tab = $request->query('tab');
        if (!$tab) $tab = 'profile';

        $user = Session::get('user');
        if (!$user) {
            return redirect(route('auth.login'));
        }

        if (!$user->company_id) {
            return redirect(route('company.register'));
        }

        $company = Company::findOrFail($user->company_id);
        
        $data = [
            'company' => $company,
            'tab' => $tab
        ];
        
        if ($tab == "jobs-posted") {
            $jobs = Job::all();
            $data['jobs'] = $jobs;
        }

        return view('company.dashboard', $data);
    }
}
