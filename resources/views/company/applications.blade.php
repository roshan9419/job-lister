<style>
    .heading {
        display: flex;
        justify-content: space-between;
        padding-top: 20px;
    }
    .title-heading {
        font-size: 2rem;
        font-weight: bolder;
    }
    .create-btn {
        background: royalblue;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        font-size: 1rem;
        height: min-content;
    }
    .create-btn:hover {
        color: rgb(184, 184, 184)
    }
    .job-title {
        text-decoration: none;
    }
    .max-1-line {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        line-clamp: 1;
        -webkit-box-orient: vertical;
    }
</style>

<section class="vh-100" style="background-color: #fff;">
    <div class="container">
        <div class="heading">
            <span class="title-heading">
                Applications
                @if (sizeof($jobs) == 1)
                    ({{ array_values($jobs)[0]->title }})
                @endif
            </span>
            {{-- <form action="{{ route('company.dashboard') }}" method="GET" style="display:flex; height:40px">
                <input type="hidden" name="tab" value="applications">
                <input type="text" name="job_id" class="form-control" value="{{ isset($job) ? $job->job_id : '' }}">
                <input type="submit" value="Search" class="btn btn-primary">
            </form> --}}
        </div>
        <hr>
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        @if (sizeof($jobs) > 1)
                            <th scope="col">Job Title</th>
                        @endif
                        <th scope="col">Candidate Name</th>
                        <th scope="col">Links</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Status</th>
                        <th scope="col">Applied Date</th>
                        <th scope="col" style="text-align:right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            @if (sizeof($jobs) > 1)
                                <td><a href="{{ route('job.view', [$application->job_id, $jobs[$application->job_id]->title_slug]) }}" class="job-title max-1-line">{{ $jobs[$application->job_id]->title }}</a></td>
                            @endif
                            <td><a class="job-title max-1-line">{{ $candidates[$application->candidate_id]->name }}</a></td>
                            <td><a class="job-title max-1-line" href="{{ $candidates[$application->candidate_id]->resume_link }}" target="_blank">Resume</a></td>
                            <td>{{ $candidates[$application->candidate_id]->contact_number }}</td>
                            <td>
                                <span style="color: white"
                                    class="badge rounded-pill {{ $application->status == "PENDING" ? 'bg-primary' : ''}} {{ $application->status == "ACCEPTED" ? 'bg-success' : ''}} {{ $application->status == "REJECTED" ? 'bg-secondary' : ''}}" >
                                    {{ $application->status }}
                                </span>
                            </td>
                            <td>{{ $application->created_at->diffForHumans() }}</td>
                            <td>
                                <div style="display: flex; justify-content:right">
                                    <a href="" class="btn btn-primary btn-sm" style="margin-right: 2px">Accept</a>
                                    <a href="" class="btn btn-danger btn-sm" style="margin-right: 2px">Reject</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>