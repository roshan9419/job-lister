<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CandidateController extends Controller
{
    public function form()
    {
        return view('candidate.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'skills' => 'required',
            'resume_link' => 'required',
        ]);

        $candidate = new Candidate();

        $candidate->name = $request->name;
        $candidate->skills = explode(',', $request->skills);
        $candidate->resume_link = $request->resume_link;
        if ($request->about) $candidate->about = $request->about;
        if ($request->website) $candidate->website = $request->website;
        if ($request->contact_number) $candidate->contact_number = $request->contact_number;
        if ($request->social_links) $candidate->social_links = $request->social_links;
        if ($request->alternate_email) $candidate->alternate_email = $request->alternate_email;

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

    public function dashboard(Request $request)
    {
        $tab = $request->query('tab');
        if (!$tab) $tab = 'profile';

        $user = Session::get('user');

        if (!$user->candidate_id) {
            return redirect(route('candidate.register'));
        }

        $candidate = Candidate::findOrFail($user->candidate_id);

        $data = [
            'candidate' => $candidate,
            'tab' => $tab
        ];


        if ($tab == "applications") {
            $status = $request->query('status');
            $jobs = array();
            if ($status) {
                $applications = Application::where('candidate_id', $candidate->candidate_id)->where('status', Str::upper($status))->latest()->get();
            } else {
                $applications = Application::where('candidate_id', $candidate->candidate_id)->latest()->get();
            }
            foreach ($applications as $key => $value) {
                $job = Job::where('job_id', $value->job_id)->first();
                $jobs[$value->job_id] = $job;
            }
            $data['jobs'] = $jobs;
            $data['applications'] = $applications;
        }

        // id('application_id');
        // unsignedBigInteger('job_id');
        // unsignedBigInteger('candidate_id');
        // string('status'); // PENDING(default), ACCEPTED, REJECTED
        // text('rejection_reason')->nullable();
        // timestamps();

        return view('candidate.dashboard', $data);
    }
}
