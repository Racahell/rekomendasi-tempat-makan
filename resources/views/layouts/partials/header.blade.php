<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" >
  <div class="container-xl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row order-md-last">
      @auth
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" style="background-image: url('https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}')"></span>
          <div class="d-none d-xl-block ps-2">
            <div>{{ Auth::user()->name }}</div>
            <div class="mt-1 small text-secondary">{{ Auth::user()->role->name ?? 'User' }}</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </div>
      </div>
      @else
      <div class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary ms-2">Register</a>
      </div>
      @endauth
    </div>
  </div>
</header>
