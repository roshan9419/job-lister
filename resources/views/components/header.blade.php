<nav class="navbar navbar-light bg-light mx-3">
    <a class="navbar-brand" href="/">
      <img src="https://img.freepik.com/free-vector/q-logo_3211-19.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
      Job Lister
    </a>
    @if (session('user'))
      <div style="margin-left: auto">
        <a class="btn btn-danger" href="{{ route('auth.logout') }}">LogOut</a>
      </div>
    @else
      <div style="margin-left: auto">
        <a class="btn btn-primary" href="{{ route('auth.login') }}">Login with Google</a>
      </div>
    @endif
</nav>