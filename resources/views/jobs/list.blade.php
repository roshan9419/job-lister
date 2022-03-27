<x-app-layout>
    
    <x-header></x-header>
    <style>
        .job-card-header {
            display: flex;
            justify-content: space-between;
        }
        .job-title {
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: rgb(37, 37, 37);
        }
        .date-ago {
            height: 25px;
            background: rgba(65, 105, 225, 0.205);
            padding: 3px 6px;
            border-radius: 5px;
            font-size: 0.7rem;
            color: royalblue;
            display: block;
            width: max-content;
            white-space: nowrap;
        }
        .date-ago i {
            color: royalblue;
        }

        .skill {
            margin-right: 3px;
            background: royalblue;
            color: white;
            padding: 3px 6px;
            border-radius: 5px;
            font-size: 0.7rem;
        }

        .company-logo {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .job-card {
            padding: 20px;
            text-decoration: none;
            transition: 100ms ease-in-out;
        }
        .job-card:hover {
            box-shadow: 0 1px 2px rgba(0,0,0,0.07), 
                0 2px 4px rgba(0,0,0,0.07), 
                0 4px 8px rgba(0,0,0,0.07), 
                0 8px 16px rgba(0,0,0,0.07);
        }
        .job-card-body {
            display: flex;
            /* background: #f59a9a; */
        }
        .job-items-row {
            display: flex;
            flex-wrap: wrap;
        }
        .job-item {
            margin-right: 20px;
        }
        .job-item i {
            color: rgb(85, 85, 85);
        }
        .job-desc {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .search-container {
            padding: 5px;
            display: flex;
            justify-content: space-between;
            border: 1px solid #868686;
            margin-bottom: 25px;
            border-radius: 25px;
            background: white;
        }
        .search-box {
            outline: none;
            border: none;
            width: 100%;
            margin-left: 10px;
            font-size: 16px;
        }
        .search-btn {
            display: flex;
            border-radius: 20px;
            padding: 10px 25px;
        }
        .search-btn i {
            margin-right: 5px;
        }

        .filter-area {
            /* background: rebeccapurple; */
            padding: 20px;
            height: min-content;
        }
        .filter-block {
            /* background: #9c9999; */
            margin-bottom: 10px;
        }
        .filter-label {
            font-size: 16px;
            font-weight: 600;
        }
        .filter-block ul {
            padding: 10px;
        }
        .filter-list-item {
            list-style: none;
        }

        @media (max-width: 995px) {
            .filter-area {
                display: none;
            }
        }

    </style>

    <div class="row container p-4 mx-auto">

        <div class="col-md-2 filter-area card">
            
                <form method="GET" action="{{ route('jobs.list') }}">
                    <div class="filter-block">
                        <div class="filter-label">Job Types</div>
                        <ul>
                            @foreach ($jobTypes as $type)
                                <li class="filter-list-item">
                                    <input type="checkbox" value="{{ $type }}" name="jobTypes[]" 
                                        {{in_array($type, request()->input('jobTypes',[])) ? 'checked' : ''}}>
                                    <label>{{ $type }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
    
                    <div class="filter-block">
                        <div class="filter-label">Category</div>
                        <select class="form-control" style="cursor: pointer" name="category">
                            <option value="{{null}}">Choose category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" 
                                    {{($category->category_id == request()->input('category',[])) ? 'selected' : ''}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-block">
                        <div class="filter-label">Location</div>
                        <ul>
                            @foreach ($locationTypes as $type)
                                <li class="filter-list-item">
                                    <input type="checkbox" value="{{ $type }}" name="locationTypes[]" 
                                        {{in_array($type, request()->input('locationTypes',[])) ? 'checked' : ''}}>
                                    <label>{{ $type }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width:100%">
                        <i class="bi bi-funnel mr-2"></i>
                        Apply Filters
                    </button>
                </form>
   
        </div>

        <div class="col-md-10 main-area">

            <div class="">
                <h2>Find the <strong>best job</strong> that fits you</h2>
                {{-- <h5 class="text-muted">Find the <strong>best job</strong> that fits you</h5> --}}
    
                <form action="{{ route('jobs.list') }}" method="GET">
                    <div class="search-container">
                        <input class="search-box" type="text" name="s" placeholder="Job title or keyword" autocomplete="off"
                            value="{{ request()->input('s') }}" required>
                        <button type="submit" class="btn btn-primary search-btn">
                            <i class="bi bi-search"></i>
                            Search
                        </button>
                    </div>
                    
                </form>
    
            </div>

            @if (sizeof($jobs) == 0)
                @component('components.no-results', ['word' => request()->input('s')]) @endcomponent    
            @endif

            @foreach ($jobs as $job)
                <a class="job-card card mb-3" href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}">
                    <div class="job-card-body">
                        <img class="company-logo"
                            src="{{ asset('storage/images/companies/'.$companies[$job->company_id]->name_slug.'.jpg') }}" alt="">
                        <div class="content">
                            <div class="job-card-header">
                                <h4 class="job-title">{{ $job->title }}</h4>
                                <div class="date-ago">
                                    <i class="bi bi-clock"></i>
                                    <span>{{ $job->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div>
                                <i style="color: rgb(51, 51, 51)" class="bi bi-building"></i>
                                <span style="color: rgb(51, 51, 51)" class="card-subtitle mb-2">{{$companies[$job->company_id]->name}}</span>
                            </div>
                            <div class="job-items-row">
                                <div class="job-item">
                                    <i class="bi bi-briefcase"></i>
                                    <small class="text-muted">{{ $job->job_type }}</small>
                                </div>
                                <div class="job-item">
                                    <i class="bi bi-bag"></i>
                                    <small class="text-muted">{{ $job->experience }} Yrs</small>
                                </div>
                                <div class="job-item">
                                    <i class="bi bi-people"></i>
                                    <small class="text-muted">{{ $job->applicants ? sizeof($job->applicants) : 0 }} Applicants</small>
                                </div>
                                <div class="job-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <small class="text-muted">{{ $job->job_location }} ({{ $job->location_type }})</small>
                                </div>
                            </div>
                            <div class="job-item job-desc">
                                <i class="bi bi-file-earmark-text"></i>
                                <small class="text-muted">{{ $job->description }}</small>
                            </div>
                            <div class="mb-2"></div>
                            @foreach ($job->skills_required as $skill)
                                <span class="skill">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
    
            <div style="display:flex; justify-content: space-between;">
                <div class=""></div>
                {{ $jobs->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

    <x-footer></x-footer>

</x-app-layout>