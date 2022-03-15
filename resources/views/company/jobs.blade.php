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
            <span class="title-heading">Job Posted</span>
            <a href="?tab=create-job" class="create-btn">Create Job</a>
        </div>
        <hr>
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <div class="table-responsive">
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
                    <?php $i = 0; ?>
                    @foreach ($jobs as $job)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td><a class="job-title max-1-line" href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}">{{ $job->title }}</a></td>
                            <td>
                                <span style="color: white"
                                    class="badge rounded-pill {{ $job->status == "REVIEW" ? 'bg-primary' : ''}} {{ $job->status == "LIVE" ? 'bg-success' : ''}} {{ $job->status == "CLOSED" ? 'bg-secondary' : ''}}" >
                                    {{ $job->status }}
                                </span>
                            </td>
                            <td>{{ $job->job_type }}</td>
                            <td>
                                @if ($job->applicants) {{ Str::length($job->applicants) () }} @else 0 @endif
                            </td>
                            <td>{{ $job->job_location }}</td>
                            <td>{{ $job->created_at->diffForHumans() }}</td>
                            <td>
                                <div style="display: flex;">
                                    <span class="btn btn-primary btn-sm" style="margin-right: 2px">Share</span>
                                    @if ($job->status != "CLOSED")
                                        <form action="{{ route('job.close', $job->job_id) }}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-danger btn-sm">Close</a>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>