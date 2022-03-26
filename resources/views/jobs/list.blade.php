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
            justify-content:flex-end;
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
            border-radius: 20px;
            padding: 10px 25px;
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

    </style>

    <div class="row container p-4 mx-auto">

        <div class="col-md-2 filter-area card">
            
                <form>
                    <div class="filter-block">
                        <div class="filter-label">Job Types</div>
                        <ul>
                            @foreach ($job_types as $type)
                                <li class="filter-list-item">
                                    <input type="checkbox" value="{{ $type }}" name="jobTypes[]">
                                    <label>{{ $type }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
    
                    <div class="filter-block">
                        <div class="filter-label">Category</div>
                        <select class="form-control" name="category">
                            <option value="">Choose category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-block">
                        <div class="filter-label">Location</div>
                        <ul>
                            @foreach ($location_types as $type)
                                <li class="filter-list-item">
                                    <input type="checkbox" value="{{ $type }}" name="locationTypes[]">
                                    <label>{{ $type }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </form>
   
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-funnel mr-2"></i>
                    Apply Filters
                </button>
        </div>

        <div class="col-md-10 main-area">

            <div class="">
                <h2>Find the <strong>best job</strong> that fits you</h2>
                {{-- <h5 class="text-muted">Find the <strong>best job</strong> that fits you</h5> --}}
    
                <form action="{{ route('jobs.search') }}" method="GET">
                    <div class="search-container">
                        <input class="search-box" type="text" name="q" placeholder="Job title or keyword" autocomplete="off">
                        <button type="submit" class="btn btn-primary search-btn">Search</button>
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
    
            {{-- <div style="display:inline-flex; margin-left: auto;"> --}}
                {{ $jobs->links('pagination::bootstrap-4') }}
            {{-- </div> --}}
        </div>

        

    </div>

    <x-footer></x-footer>

</x-app-layout>