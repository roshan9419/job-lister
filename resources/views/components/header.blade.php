<style>
  .google-icon {
    width: 20px;
    height: 20px;
    background: white;
    padding: 2px;
    border-radius: 10px;
    margin-right: 5px;
  }

  .logout-icon {
    float: right;
    margin-top: 5px;
  }

  .dropdown-item:hover {
    background: royalblue;
    color: white;
  }

  .dropdown {
    z-index: 1000;
  }
</style>

<nav class="navbar navbar-light bg-light px-3">
  <a class="navbar-brand" href="/">
    <img src="https://img.freepik.com/free-vector/q-logo_3211-19.jpg" width="30px" height="30px"
      class="d-inline-block align-top" alt="">
    Job Lister
  </a>
  @if (session('user'))
  <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      @component('components.smallphoto', ['url' => session('user')->photo_url])@endcomponent
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
      @if (!session('user')->company_id && !session('user')->candidate_id)
        <li>
          <a style="cursor: pointer;" class="dropdown-item" href="/register">Register</a>
        </li>
      @else
        @if (session('user')->company_id)
        <li><a style="cursor: pointer;" class="dropdown-item" href="{{ route('company.dashboard', ['tab' => 'profile']) }}">Profile</a></li>
        <li>
          <a style="cursor: pointer;" class="dropdown-item" href="{{ route('company.dashboard') }}">Dashboard</a>
        </li>      
        @else
        <li><a style="cursor: pointer;" class="dropdown-item" href="{{ route('candidate.dashboard', ['tab' => 'profile']) }}">Profile</a></li>
        <li>
          <a style="cursor: pointer;" class="dropdown-item" href="{{ route('candidate.dashboard') }}">Dashboard</a>
        </li>
        <li>
          <a style="cursor: pointer;" class="dropdown-item" href="{{ route('candidate.dashboard', ['tab' => 'applications']) }}">My Applications</a>
        </li>      
        @endif
      
      @endif
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a style="cursor: pointer;" class="dropdown-item" href="{{ route('auth.logout') }}">Logout<i
            class="fa fa-sign-out logout-icon"></i></a></li>
    </ul>
  </div>
  @else
  <div style="margin-left: auto">
    <a class="btn btn-primary" href="{{ route('auth.login') }}">
      <img class="google-icon" src="https://pbs.twimg.com/profile_images/1455185376876826625/s1AjSxph_400x400.jpg"
        alt="Google">
      Login with Google</a>
  </div>
  @endif
</nav>