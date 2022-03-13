<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function createJobPost(Request $request)
    {
        // return dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'job_location' => 'required',
            'location_type' => 'required',
            'skills_required' => 'required',
            'experience' => 'required',
            'total_vacancies' => 'min:0'
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->title_slug = Str::slug($request->title);
        $job->description = $request->description;
        $job->job_type = $request->job_type;
        $job->experience = $request->experience;
        $job->apply_last_date = $request->apply_last_date;
        $job->job_location = $request->job_location;
        $job->location_type = $request->location_type;
        $job->skills_required = explode(',', $request->skills_required);

        $job->company_id = $request->session()->get('user')->company_id;
        $job->status = 'REVIEW';
        
        if($request->external_apply_link)
            $job->external_apply_link = $request->external_apply_link;
        if($request->total_vacancies)
            $job->total_vacancies = (int)$request->total_vacancies;
        if($request->start_salary)
            $job->start_salary = (int)$request->start_salary;
        if($request->end_salary)
            $job->end_salary = (int)$request->end_salary;

        // return dd($job);
        $res = $job->save();

        if ($res) {
            return back()->with('success', 'Job post created');
            //redirect to that job page
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function listJobs()
    {
        $jobs = Job::all();
        return view('jobs.list', ['jobs' => $jobs]);
    }

}
