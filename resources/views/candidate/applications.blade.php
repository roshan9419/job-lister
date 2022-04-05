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
            <span class="title-heading">My Applications</span>
            <a href="/jobs" class="create-btn">Find Jobs</a>
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
                        <th scope="col">Applied Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td><a class="job-title max-1-line" href="{{ route('job.view', ['job_id' => $application->job_id, 'slug' => $jobs[$application->job_id]->title_slug]) }}">{{ $jobs[$application->job_id]->title }}</a></td>
                            <td>
                                <span style="color: white"
                                    class="badge rounded-pill {{ $application->status == "PENDING" ? 'bg-primary' : ''}} {{ $application->status == "ACCEPTED" ? 'bg-success' : ''}} {{ $application->status == "REJECTED" ? 'bg-danger' : ''}}" >
                                    {{ $application->status }}
                                </span>
                            </td>
                            <td>{{ $application->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>