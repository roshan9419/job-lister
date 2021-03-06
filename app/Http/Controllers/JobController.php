<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function createJobPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'job_location' => 'required',
            'location_type' => 'required',
            'skills_required' => 'required',
            'experience' => 'required',
            'total_vacancies' => 'min:0',
            'category_id' => 'required'
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->title_slug = Str::slug($request->title);
        $job->description = $request->description;
        $job->category_id = $request->category_id;
        $job->job_type = $request->job_type;
        $job->experience = $request->experience;
        $job->apply_last_date = $request->apply_last_date;
        $job->job_location = $request->job_location;
        $job->location_type = $request->location_type;
        $job->skills_required = explode(',', $request->skills_required);

        $job->company_id = $request->session()->get('user')->company_id;
        $job->status = 'REVIEW';

        if ($request->external_apply_link)
            $job->external_apply_link = $request->external_apply_link;
        if ($request->total_vacancies)
            $job->total_vacancies = (int)$request->total_vacancies;
        if ($request->start_salary)
            $job->start_salary = (int)$request->start_salary;
        if ($request->end_salary)
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

    public function listJobs(Request $req)
    {
        // return dd($req);
        $filterQuery = Job::where('status', 'LIVE');

        // apply filter
        if ($req->get('category')) {
            $filterQuery = $filterQuery->where('category_id', $req->get('category'));
        }
        if ($req->get('jobTypes')) {
            $filterQuery = $filterQuery->whereIn('job_type', $req->get('jobTypes'));
        }
        if ($req->get('locationTypes')) {
            $filterQuery = $filterQuery->whereIn('location_type', $req->get('locationTypes'));
        }
        if ($req->get('s')) {
            $filterQuery = $filterQuery->where('title', 'like', '%' . $req->get('s') . '%');
        }
        if ($req->get('company')) {
            $filterQuery = $filterQuery->where('company_id', $req->get('company'));
        }

        $filterQuery = $filterQuery->orderBy('created_at', 'DESC');
        $jobs = $filterQuery->paginate(5);

        $companies = $this->getCompaniesData($jobs);
        $job_types = getJobTypes();
        $location_types = getJobLocationTypes();
        $categories = Category::all();

        return view('jobs.list', [
            'jobs' => $jobs,
            'categories' => $categories,
            'jobTypes' => $job_types,
            'locationTypes' => $location_types,
            'companies' => $companies
        ]);
    }

    public function searchJobs(Request $req)
    {

        $jobs = Job::where('status', 'LIVE')->latest()->get();
        if ($req->has('q')) {
            $query =  strtolower($req->get('q'));
            $jobs = $jobs->filter(function ($job) use ($query) {
                $skills = join(" ", $job->skills_required);
                if (
                    Str::contains(strtolower($job->title), $query) ||
                    Str::contains(strtolower($skills), $query) ||
                    Str::contains(strtolower($job->job_location), $query) ||
                    Str::contains(strtolower($job->location_type), $query)
                ) {
                    return true;
                } else {
                    return false;
                }
            });
        }
        $companies = $this->getCompaniesData($jobs);
        return view('jobs.list', ['jobs' => $jobs, 'companies' => $companies]);
    }

    public function viewJobPost($job_id, $slug)
    {
        $job = Job::findOrFail($job_id);
        $company = $this->getCompaniesData([$job])[$job->company_id];
        return view('jobs.view', ['job' => $job, 'company' => $company]);
    }

    private function getCompaniesData($jobs)
    {
        $companies = array();
        foreach ($jobs as $idx => $job) {
            $c_id = $job->company_id;
            if (!array_key_exists($c_id, $companies)) {
                $company = Company::where('company_id', $c_id)->first();
                $companies[$c_id] = $company;
            }
        }
        return $companies;
    }

    public function updateStatus(Request $req, $job_id)
    {
        $job = Job::findOrFail($job_id);

        if ($req->has('live')) $job->status = "LIVE";
        if ($req->has('close')) $job->status = "CLOSED";

        $job->save();
        return back()->with('success', 'Job status updated');
    }

    
}
// REVIEW, LIVE, CLOSED