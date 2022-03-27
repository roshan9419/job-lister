<style>
    .about {
        font-size: 12px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .card-img-top {
        width: 50px;
        margin-right: 10px;
        border-radius: 3px;
    }
</style>
<div class="card" style="width: 18rem;">
    <div class="row" style="padding: 10px">
        <div class="col-md-3">
            <img class="card-img-top" src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}"
                alt="Card image cap">
        </div>
        <div class="col-md-9">
            <strong class="card-title"><a href="{{ route('company.profile', ['name_slug' => $company->name_slug]) }}">{{ $company->name }}</a></strong><br>
            <small class="text-muted">{{$company->state}}, {{$company->country}}</small>
            <p class="about">{{ $company->about }}</p>
            <a href="{{ route('jobs.list', ['company' => $company->company_id]) }}" class="btn btn-primary btn-sm">View all Jobs</a>
        </div>
    </div>
</div>