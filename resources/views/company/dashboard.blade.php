<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
      
      <div class="container-fluid">
        <div class="row flex-nowrap">
          
          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-vh-100" style="width: 280px; position: fixed;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <img src="{{ $company->photo_url }}" alt="" width="32" height="32" class="rounded-circle me-2">
              <span class="fs-4">{{ $company->name }}</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="?tab=profile" class="nav-link text-white {{ $tab == 'profile' ? 'active' : '' }}" aria-current="page">
                  {{-- <i class="fa-light fa-building"></i> --}}
                  Profile
                </a>
              </li>
              <li>
                <a href="?tab=jobs-posted" class="nav-link text-white {{ $tab == 'jobs-posted' ? 'active' : '' }}">
                  {{-- <i class="fa-light fa-building"></i> --}}
                  Jobs Posted
                </a>
              </li>
              <li>
                <a href="?tab=create-job" class="nav-link text-white {{ $tab == 'create-job' ? 'active' : '' }}">
                  {{-- <i class="fa-light fa-building"></i> --}}
                  Create Job Post
                </a>
              </li>
            </ul>
            <hr>
            <div class="dropdown pb-4">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ $user->photo_url }}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ $user->name }}</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div>
            
          </div>
  
          <div class="col py-3" style="margin-left: 280px; background-color: #eee;">
            @switch($tab)
                @case('profile')
                    @include('company.profile')
                    @break
                @case('jobs-posted')
                    <div>Nothing yet, comming soon!</div>
                    @break
                @case('create-job')
                    <div>Nothing yet, comming soon!</div>
                    @break
            @endswitch
            
          </div>

        </div>
      </div>

        
        {{-- <div class="container-fluid"> --}}
          {{-- <div class="row flex-nowrap"> --}}
              {{-- <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark"> --}}
                  {{-- <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"> --}}
                  {{-- Sidebar --}}
                  {{-- </div> --}}
              {{-- </div> --}}
              {{-- <div class="col py-3"> --}}
                  {{-- Content area... --}}
              {{-- </div> --}}
          {{-- </div> --}}
      {{-- </div> --}}

    </body>
</html>