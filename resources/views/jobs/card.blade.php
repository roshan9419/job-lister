<style>
    .card {
        border-radius: 5px
    }
    .c-details span {
        font-weight: 300;
        font-size: 13px
    }
    .heading {
        font-size: 1.1rem;
        text-decoration: none;
    }
    .icon img {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }
    .badge a {
        background-color: rgba(65, 105, 225, 0.205);
        width: 60px;
        height: 25px;
        border-radius: 5px;
        display: flex;
        color: royalblue;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }
    .text1 {
        font-size: 14px;
        font-weight: 600
    }
    .text2 {
        color: #a5aec0
    }
    .skill {
        margin-right: 2px;
        background: royalblue;
        color: white;
        padding: 3px 6px;
        border-radius: 50px;
        font-size: 0.6rem;
    }
    .company-name {
        text-decoration: none;
        font-weight: 600;
    }
</style>

{{-- Pass (job, company) --}}

    <div class="card p-3 mb-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div class="icon"> <img src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}" alt="Company"> </div>
                <div class="ms-2 c-details">
                    <a href="{{ route('company.profile', ['name_slug' => $company->name_slug]) }}" class="company-name mb-0">{{ $company->name }}</a><br> <span>{{ $job->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <?php $user = Session::get('user'); ?>
            @if (!($user && $user->company_id))
                <div class="badge"> <a href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}">Apply</a> </div>
            @endif
        </div>
        <div class="mt-2">
            <a class="heading" href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}" >{{ $job->title }}</a>
            <div class="mt-1"> <span class="text1">{{ $job->job_location }} <span class="text2">({{ $job->location_type }})</span></span> </div>
            @foreach ($job->skills_required as $skill)
                <span class="skill">{{ $skill }}</span>
            @endforeach
        </div>
    </div>
