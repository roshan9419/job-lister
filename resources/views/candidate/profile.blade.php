<style>
  .gradient-custom {
    background: #f6d365;
    background: -webkit-linear-gradient(to right bottom, rgb(29, 62, 168), rgb(124, 157, 250));
    background: linear-gradient(to right bottom, rgb(64, 86, 214), rgb(133, 161, 253))
  }
</style>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ session('user')->photo_url }}" alt="User" class="img-fluid my-5" style="width: 80px;" />
              <h5>{{ $candidate->name }}</h5>
              <p>Web Designer</p>
              <i class="bi bi-pencil-square mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{ session('user')->email }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">{{ $candidate->contact_number }}</p>
                  </div>
                </div>
                <h6>Links</h6>
                <hr class="mt-0 mb-4">
                <div class="mb-3">
                  <h6>Resume</h6>
                  <p class="text-muted"><a href="{{ $candidate->resume_link }}" target="_blank">{{
                      $candidate->resume_link }}</a></p>
                </div>
                @if ($candidate->website)
                <div class="mb-3">
                  <h6>Website</h6>
                  <p class="text-muted"><a href="{{ $candidate->website }}" target="_blank">{{
                      $candidate->website }}</a></p>
                </div>
                @endif
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>