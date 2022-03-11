<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function createJobPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'job_locations' => 'required',
            'skills_required' => 'required',
            'experience' => 'required',
            'apply_last_date' => 'required'
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->title_slug = Str::slug($request->title);
        $job->description = $request->description;
        $job->job_type = $request->job_type;
        $job->experience = $request->experience;
        $job->apply_last_date = $request->apply_last_date;
        $job->job_locations = $request->job_locations;
        $job->skills_required = $request->skills_required;

        $job->company_id = '';
        $job->company_name = '';
        $job->status = 'REVIEW';
        
        if($request->external_apply_link)
            $job->external_apply_link = $request->external_apply_link;
        if($request->total_vacancies)
            $job->total_vacancies = $request->total_vacancies;
        if($request->start_salary)
            $job->start_salary = $request->start_salary;
        if($request->end_salary)
            $job->end_salary = $request->end_salary;
        if($request->duration)
            $job->duration = $request->duration;

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
