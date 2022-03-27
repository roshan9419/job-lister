<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    public function apply($job_id)
    {
        $candidate_id = Session::get('user')->candidate_id;

        // check if already applied or not
        $application = Application::where('candidate_id', $candidate_id)->where('job_id', $job_id)->first();
        if ($application) {
            return back()->with('fail', "You have already applied for this job");
        }

        $job = Job::findOrFail($job_id);

        $application = new Application();
        $application->job_id = $job_id;
        $application->candidate_id = $candidate_id;
        $application->status = "PENDING";

        $applicants = $job->applicants;
        if (!$applicants) {
            $applicants = array();
        }

        // update applicants list
        array_push($applicants, $candidate_id);
        $job->applicants = $applicants;

        $res = $application->save();
        $job->save();

        if ($res) {
            return redirect(route('candidate.dashboard', ['tab' => 'applications']))->with('success', 'You have been successfully applied for - ' . $job->title);
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function action(Request $req) {
        $application_id = $req->application_id;
        $action = $req->action;

        if(!$application_id || !$action || !in_array($action, ['ACCEPT', 'REJECT'])) {
            return back()->with('fail', 'Invalid request');
        }

        $application = Application::find($application_id);
        
        $application->status = $action == 'ACCEPT' ? 'ACCEPTED' : 'REJECTED';
        if ($req->rejection_reason) {
            $application->rejection_reason = $req->rejection_reason;
        }

        $res = $application->save();
        if ($res) {
            return back()->with('success', $action == 'ACCEPT' ? "Application accepted" : "Application rejected");
        } else {
            return back()->with('fail', 'Something went wrong, please try again!');
        }
    }
}
