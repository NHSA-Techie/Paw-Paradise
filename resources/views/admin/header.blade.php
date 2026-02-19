<header class="header shadow-sm">   
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <!-- Left side: Brand + Sidebar toggle -->
      <div class="d-flex align-items-center">
        <!-- Brand -->
        <a href="#" class="navbar-brand d-flex align-items-center mr-3">
          <span class="brand-text brand-big visible text-uppercase">
            <strong class="dashtext-1">PawParadise</strong><strong>Hotel</strong>
          </span>
          {{-- <span class="brand-text brand-sm">
            <strong class="dashtext-1">Paw</strong><strong>Paradise</strong>
          </span> --}}
        </a>

        <!-- Sidebar toggle -->
        {{-- <button class="sidebar-toggle"><i class="fa fa-bars"></i></button> --}}
      </div>

      <!-- Right side: User + Logout -->
      <div class="d-flex align-items-center">
        <span class="text-light mr-3">
          Welcome to Admin dashboard ! , <strong class="dashtext-1">{{ Auth::user()->name }}</strong>
        </span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">
            <i class="fa fa-sign-out mr-1"></i> Logout
          </button>
        </form>
      </div>

    </div>
  </nav>
</header>
