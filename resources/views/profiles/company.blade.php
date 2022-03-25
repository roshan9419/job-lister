<x-app-layout>

    <style>
        body {
            background: #eee;
            overflow-x: hidden
        }

        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat
        }

        .card {
            border-radius: 5px
        }
        .heading {
            font-size: 20px;
            text-decoration: none;
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
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

        .progress {
            height: 8px;
            border-radius: 10px
        }

        .progress div {
            background-color: red
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
    </style>

    <x-header></x-header>
    {{-- @include('components.company-card') --}}

    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head row">
                        <div class="profile mr-3">
                            <img src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}" alt="..."
                                width="130" class="rounded mb-2 img-thumbnail">
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">{{ $company->name }}</h4>
                            <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $company->state }}, {{
                                $company->country }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    {{-- <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i
                                    class="fas fa-image mr-1"></i>Photos</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i
                                    class="fas fa-user mr-1"></i>Followers</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i
                                    class="fas fa-user mr-1"></i>Following</small>
                        </li>
                    </ul> --}}
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">About</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0">{{ $company->about }}</p>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent jobs</h5><a href="#" class="btn btn-link text-muted">View all</a>
                    </div>
                    @foreach ($recentJobs as $job)
                    <div class="mb-3">
                        <div class="card p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"> <img src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}" alt="Company"> </div>
                                    <div class="ms-2 c-details">
                                        <strong class="mb-0">{{ $company->name }}</strong><br> <span>{{ $job->created_at->diffForHumans() }}</span>
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>