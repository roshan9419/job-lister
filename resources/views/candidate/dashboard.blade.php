<x-app-layout>
    <div class="container-fluid">
      <div class="row flex-nowrap">
  
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-vh-100"
          style="width: 280px; position: fixed;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="/images/assets/logo.svg" alt="" width="32" height="32"
              class="rounded-circle me-2">
            <span class="fs-4">{{ config('app.name', 'Job Lister') }}</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="?tab=profile" class="nav-link text-white {{ $tab == 'profile' ? 'active' : '' }}"
                aria-current="page">
                {{-- <i class="fa-light fa-building"></i> --}}
                Profile
              </a>
            </li>
            <li>
              <a href="?tab=applications" class="nav-link text-white {{ $tab == 'applications' ? 'active' : '' }}">
                {{-- <i class="fa-light fa-building"></i> --}}
                My Applications
              </a>
            </li>
          </ul>
          <hr>
          <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ session('user')->photo_url }}" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>{{ session('user')->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{route('auth.logout')}}">Sign out</a></li>
            </ul>
          </div>
  
        </div>
  
        <div class="col py-3" style="margin-left: 280px; background-color: #eee;">
          @switch($tab)
            @case('profile')
              @include('candidate.profile')
              @break
            @case('applications')
              @include('candidate.applications')
              @break
          @endswitch
  
        </div>
  
      </div>
    </div>
  </x-app-layout>