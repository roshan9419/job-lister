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
        .icon {
            font-size: 1.3rem;
        }
    </style>

    <x-header></x-header>
    {{-- @include('components.company-card') --}}

    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 cover">
                    <div class="media align-items-end pt-5 row">
                        <div class="profile mr-3">
                            <img src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}" alt="..."
                                width="130" class="rounded mb-2">
                        </div>
                        <div class="text-white">
                            <h4 class="mt-0 mb-0">{{ $company->name }}</h4>
                            <p class="small"> <i class="bi bi-geo-alt"></i> {{ $company->state }}, {{
                                $company->country }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-light px-4 py-3 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="{{ $company->website }}" target="_blank"><i class="bi bi-globe icon"></i></a>
                        </li>
                        <div class="list-inline-item">
                            <a href="mailto:{{ $company->email }}"><i class="bi bi-envelope icon"></i></a>
                        </div>
                    </ul>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">About</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0">{{ $company->about }}</p>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent jobs</h5><a href="{{ route('jobs.list', ['company' => $company->company_id]) }}" class="btn btn-link text-muted">View all</a>
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