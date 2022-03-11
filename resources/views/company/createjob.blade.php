<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

  <p class="text-center h1 fw-bold mx-1 mx-md-4 mt-4">Create New Job</p>

  <form class="mx-1 mx-md-4" action="/company/create-job" method="POST">
    @csrf
    @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

    <div class="d-flex flex-row align-items-center mb-2">
      {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="form3Example1c">Job title</label>
        <input type="text" id="form3Example1c" name="title" class="form-control" value="{{ old('title') }}" />
        <span class="text-danger">@error('title') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="d-flex flex-row align-items-center mb-2">
      {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
      <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="form3Example3c">Description</label>
        <textarea class="form-control" id="form3Example3c" name="description" rows=10 value="{{ old('description') }}"></textarea>
        <span class="text-danger">@error('description') {{$message}} @enderror</span>
      </div>
    </div>

    <div class="form-group mb-2">
      <label for="exampleFormControlSelect1">What is the Job Type?</label>
      <select class="form-control" id="exampleFormControlSelect1" name="job-type">
        <option>Internship</option>
        <option>Full-time Job</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Job</button>

  </form>

</div>