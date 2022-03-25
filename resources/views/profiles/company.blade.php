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
                    <div class="row">
                        @foreach ($recentJobs as $job)
                            @include('jobs.card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>