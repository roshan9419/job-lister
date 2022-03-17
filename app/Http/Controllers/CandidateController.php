<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CandidateController extends Controller
{
    public function form()
    {
        return view('candidate.register');
    }

    public function register()
    {
        
        $candidate = new Candidate();
        $res = $candidate->save();
        if ($res) {
            $user_id = Session::get('user')->user_id;
            $user = User::where('user_id', $user_id)->first();
            $user->candidate_id = $candidate->candidate_id;
            $user->save();
            // udpate user object in session
            Session::put('user', $user);
            
            return back()->with('success', 'You have registered successfully as Candidate');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function updateDetails(Request $request)
    {
        $candidate_id = Session::get('user')->candidate_id;
        $candidate = Candidate::findOrFail($candidate_id);

        if ($request->about) $candidate->about = $request->about;
        if ($request->contact_number) $candidate->contact_number = $request->contact_number;
        if ($request->skills) $candidate->skills = explode(',', $request->skills);
        if ($request->website) $candidate->website = $request->website;
        if ($request->social_links) $candidate->social_links = $request->social_links;

        $res = $candidate->save();
        if ($res) {
            return back()->with('success', 'Details updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
