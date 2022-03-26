<x-app-layout>
    
    <x-header></x-header>
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

        .card-body {
            display: flex;
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
                        <input class="search-box" type="text" name="s" placeholder="Job title or keyword" autocomplete="off">
                        <button type="submit" class="btn btn-primary search-btn">
                            <i class="bi bi-search"></i>
                            Search
                        </button>
                    </div>
                    
                </form>
    
            </div>
    
            @foreach ($jobs as $job)
            <div class="card mb-3">
                <div class="card-body">
                    <img class="company-logo"
                        src="{{ asset('storage/images/companies/'.$companies[$job->company_id]->name_slug.'.jpg') }}"
                        alt="">
                    <div class="content">
                        <a href="{{ route('job.view', [$job->job_id, $job->title_slug]) }}" class="title">{{ $job->title
                            }}</a>
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
    
            <div style="display:flex; justify-content: space-between;">
                <div class=""></div>
                {{ $jobs->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

    <x-footer></x-footer>

</x-app-layout>