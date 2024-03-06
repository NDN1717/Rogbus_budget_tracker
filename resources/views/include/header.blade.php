<nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa; color: #343a40;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <img src="logo1.png" alt="Dashboard" style="width: 40px; height: auto;">
          </a>
        </li>
        @endauth
      </ul>
      <span class="navbar-text me-3">
        @auth
        {{ auth()->user()->name }}
        @endauth
      </span>
      @auth
      <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      @endauth
    </div>
  </div>
</nav>
