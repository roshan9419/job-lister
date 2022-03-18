<div class="container">

  <p class="text-center h1 fw-bold mx-1 mx-md-4 mt-4">Create New Job</p>

  <form class="mx-1 mx-md-4" action="{{route('job.create')}}" method="POST">
    @csrf
    @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="titleInput">Job title</label>
        <input type="text" id="titleInput" name="title" class="form-control" value="{{ old('title') }}" />
        <span class="text-danger">@error('title') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="descInput">Job description</label>
        <textarea class="form-control" id="descInput" name="description" rows=10 spellcheck="true">{{ old('description') }}</textarea>
        <span class="text-danger">@error('description') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      <label class="form-label" for="jobTypeInput">Job Category</label>
      <select class="form-control" id="jobTypeInput" name="category_id" required >
        <option value={{NULL}}>Choose a category</option>
        @foreach ($categories as $category)
          <option value="{{$category->category_id}}">{{ $category->name }}</option>
        @endforeach
      </select>
      <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
    </div>

    <div class="form-group mb-2">
      <label class="form-label" for="jobTypeInput">What is the Job Type?</label>
      <select class="form-control" id="jobTypeInput" name="job_type" >
        @foreach ($job_types as $type)
          <option value="{{$type}}">{{ $type }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label">Provide the Job location</label>
        <div class="row">
          <div class="col-8">
            <input type="text" id="locationInput" name="job_location" class="form-control" value="{{ old('job_location') }}" />
          </div>
          <div class="col-4">
            <select class="form-control" id="locationTypeInput" name="location_type" >
              <option value="Remote">Remote</option>
              <option value="On-site">On-site</option>
              <option value="Hybrid">Hybrid</option>
            </select>
          </div>
        </div>
        
        <small id="jobLocationsHelp" class="form-text text-muted">
          eg, Bangalore, Karnataka, India (Remote)
        </small>
        <span class="text-danger">@error('job_location') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label">What are the skills required?</label>
        <input type="text" id="skillReqInput" name="skills_required" class="form-control" value="{{ old('skills_required') }}" />
      </div>
      <small id="skillReqHelp" class="form-text text-muted">
        Provide skill names separated by comma (eg, Nodejs, Firebase, AWS)
      </small>
      <span class="text-danger">@error('skills_required') {{$message}} @enderror</span>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="flex-fill mb-0">
        <label for="expRange" class="form-label" id="expLabel">Experience needed (0 yrs)</label><br>
        <input type="range" class="form-range" min="0" max="10" step="1" value="0" id="expRange" name="experience">
      </div>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="applyLinkInput">Add external apply link is any?</label>
        <small class="form-text text-muted">(optional)</small>
        <input type="text" id="applyLinkInput" name="external_apply_link" class="form-control" value="{{ old('external_apply_link') }}" />
        <span class="text-danger">@error('external_apply_link') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="totalVInput">Total Vacancies for this Job</label>
        <small class="form-text text-muted">(optional)</small>
        <input type="number" min="1" id="totalVInput" name="total_vacancies" class="form-control" value="{{ old('total_vacancies') }}" />
        <span class="text-danger">@error('total_vacancies') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label">Specify the salary range</label>
        <small class="form-text text-muted">(optional)</small>
        <div class="row">
          <div class="col">
            <input type="number" min="0" name="start_salary" placeholder="Starting Salary" class="form-control" value="{{ old('start_salary') }}" />
          </div>
          <div class="col">
            <input type="number" min="0" name="end_salary" placeholder="Maximum Salary" class="form-control" value="{{ old('end_salary') }}" />
          </div>
        </div>
      </div>
    </div>



    <button type="submit" class="btn btn-primary">Create Job</button>
    {{-- <button type="reset" class="btn btn-link">Clear</button> --}}

  </form>

</div>

{{-- 
$job->apply_last_date = $request->apply_last_date;
 --}}
