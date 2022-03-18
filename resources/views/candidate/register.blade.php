<x-app-layout>
    <x-header></x-header>
    <section style="background-color: rgb(255, 255, 255);">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="text-black" style="border-radius: 10px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-xl-6 order-2 order-lg-1">
  
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Hi, {{ explode(' ', Session::get('user')->name)[0] }}!</p>
  
                    <form class="mx-1 mx-md-4" action="{{ route('candidate.register') }}" method="POST">
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
                          <label class="form-label" for="form3Example1c">Full name</label>
                          <input type="text" id="form3Example1c" name="name" class="form-control"
                            value="{{ old('name') ? old('name') : Session::get('user')->name }}" />
                          <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Resume</label>
                          <input type="text" id="form3Example1c" name="resume_link" class="form-control"
                            value="{{ old('resume_link') }}" />
                          <span class="text-danger">@error('resume_link') {{$message}} @enderror</span>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Website</label>
                          <input type="text" id="form3Example1c" name="website" class="form-control"
                            value="{{ old('website') }}" />
                          <span class="text-danger">@error('website') {{$message}} @enderror</span>
                        </div>
                      </div>
  
                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Alternate e-mail</label>
                          <input type="email" id="form3Example3c" name="alternate_email" class="form-control"
                            value="{{ old('alternate_email') }}" />
                          <span class="text-danger">@error('alternate_email') {{$message}} @enderror</span>
                        </div>
                      </div>
  
                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Contact Number</label>
                          <input type="number" id="form3Example1c" name="contact_number" class="form-control"
                            value="{{ old('contact_number') }}" />
                          <span class="text-danger">@error('contact_number') {{$message}} @enderror</span>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Skills</label>
                          <input type="text" id="form3Example1c" name="skills" class="form-control"
                            value="{{ old('skills') }}" />
                            <small class="form-text text-muted">Provide your skills separated by comma</small>
                          <span class="text-danger">@error('skills') {{$message}} @enderror</span>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        {{-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> --}}
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">About</label>
                          <textarea class="form-control" id="form3Example1c" name="about" rows=3>{{ old('about') }}</textarea>
                          <span class="text-danger">@error('about') {{$message}} @enderror</span>
                        </div>
                      </div>
  
                      <div class="d-flex mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                      </div>
  
                    </form>
  
                  </div>
                  <div class="col-md-10 col-xl-6 d-flex align-items-center order-1 order-lg-2">
  
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                      class="img-fluid" alt="Sample image">
  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      function preview() {
          document.getElementById("logo-preview").src = URL.createObjectURL(event.target.files[0]);
          document.getElementById("logo-preview").style.height = "200px";
          document.getElementById("logo-preview").style.width = "200px";
      }
  </script>
  </x-app-layout>