<x-app-layout>

  <style>
    body {
      background-color: #eee;
    }
    #side-drawer {
      width: 280px; 
      position: fixed;
      padding: 10px;
    }
    #right-container {
      margin-left: 280px; 
    }
    .tab-icon {
      margin-right: 5px;
    }
    .company-logo {
      margin-left: 5px;
      margin-top: 5px;
    }
    @media (max-width: 1000px) {
      #side-drawer {
        width: 70px;
      }
      #right-container {
        margin-left: 70px;
      }
      .tab-icon {
        font-size: 16px;
        margin-right: 0;
      }
      .tab-text {
        display: none;
      }
    }
  </style>

  <div class="container-fluid">
    <div class="row flex-nowrap">

      <div id="side-drawer" class="d-flex flex-column flex-shrink-0 bg-dark text-white min-vh-100">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none company-logo">
          <img src="{{ asset('storage/images/companies/'.$company->name_slug.'.jpg') }}" alt="" width="32" height="32"
            class="rounded-circle me-2">
          <span class="fs-4 tab-text">{{ $company->name }}</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="?tab=profile" class="nav-link text-white {{ $tab == 'profile' ? 'active' : '' }}"
              aria-current="page">
              <i class="bi bi-person-circle tab-icon"></i>
              <span class="tab-text">Profile</span>
            </a>
          </li>
          <li>
            <a href="?tab=jobs-posted" class="nav-link text-white {{ $tab == 'jobs-posted' ? 'active' : '' }}">
              <i class="bi bi-briefcase-fill tab-icon"></i>
              <span class="tab-text">Jobs Posted</span>
            </a>
          </li>
          <li>
            <a href="?tab=create-job" class="nav-link text-white {{ $tab == 'create-job' ? 'active' : '' }}">
              <i class="bi bi-file-post tab-icon"></i>
              <span class="tab-text">Create Job Post</span>
            </a>
          </li>
          <li>
            <a href="?tab=applications" class="nav-link text-white {{ $tab == 'applications' ? 'active' : '' }}">
              <i class="bi bi-person-lines-fill tab-icon"></i>
              <span class="tab-text">Applications</span>
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ session('user')->photo_url }}" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong class="tab-text">{{ session('user')->name }}</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
            {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
            {{-- <li> <hr class="dropdown-divider"> </li> --}}
            <li><a class="dropdown-item" href="{{route('auth.logout')}}">Sign out</a></li>
          </ul>
        </div>

      </div>

      <div id="right-container" class="col py-3">
        @switch($tab)
          @case('profile')
            @include('company.profile')
            @break
          @case('jobs-posted')
            @include('company.jobs')
            @break
          @case('create-job')
            @include('company.createjob')
            @break
          @case('applications')
            @include('company.applications')
            @break
        @endswitch

      </div>

    </div>
  </div>
</x-app-layout>