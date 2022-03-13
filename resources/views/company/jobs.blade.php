<section class="vh-100" style="background-color: #fff;">
    <div class="container">
        <br>
        <h2>Job Posted</h2>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Applicants</th>
                    <th scope="col">Location</th>
                    <th scope="col">Posted</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <th scope="row">{{ $job->job_id }}</th>
                        <td><a style="text-decoration: none" href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}">{{ $job->title }}</a></td>
                        <td>
                            <span style="color: white"
                                class="badge rounded-pill {{ $job->status == "REVIEW" ? 'bg-primary' : ''}} {{ $job->status == "LIVE" ? 'bg-success' : ''}} {{ $job->status == "CLOSED" ? 'bg-secondary' : ''}}" >
                                {{ $job->status }}
                            </span>
                        </td>
                        <td>{{ $job->job_type }}</td>
                        <td>
                            @if ($job->applicants)
                                {{ Str::length($job->applicants) () }}
                            @else
                                0
                            @endif
                        </td>
                        <td>{{ $job->job_location }}</td>
                        <td>{{ $job->created_at->diffForHumans() }}</td>
                        <td>
                            <span class="btn btn-primary btn-sm">Edit</span>
                            <span class="btn btn-danger btn-sm">Close</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>