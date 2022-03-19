<style>
    .title {
        text-decoration: none;
        font-size: 1rem;
    }

    .card-subtitle {
        font-size: 0.9rem;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
    }

    .skill {
        margin-right: 3px;
        background: royalblue;
        color: white;
        padding: 3px 6px;
        border-radius: 50px;
        font-size: 0.7rem;
    }

    .company-logo {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .content {}

    .card-body {
        display: flex;
    }
</style>

@foreach ($jobs as $job)
<div class="card mb-3">
    <div class="card-body">
        <img class="company-logo"
            src="{{ asset('storage/images/companies/'.$companies[$job->company_id]->name_slug.'.jpg') }}" alt="">
        <div class="content">
            <a href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}" class="title">{{ $job->title }}</a>
            <h6 class="card-subtitle mb-2 text-muted">{{$companies[$job->company_id]->name}}</h6>
            <small class="text-muted">{{ $job->experience }}yrs - </small>
            <small class="text-muted">{{ $job->job_location }} ({{ $job->location_type }})</small><br>
            @foreach ($job->skills_required as $skill)
            <span class="skill">{{ $skill }}</span>
            @endforeach
        </div>
    </div>
</div>
@endforeach