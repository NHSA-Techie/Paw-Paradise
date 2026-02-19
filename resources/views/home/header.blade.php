<!-- header inner -->
<div class="header">
  <div class="container">
    <div class="row">
      <!-- Brand -->
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
        <div class="full">
          <div class="center-desk">
            <div class="logo">
              <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Paws Paradise Logo" class="brand-logo">
                <span class="brand-name">Paws Paradise</span>
              </a>
            </div>
          </div>
        </div>
      </div>


      <!-- Navigation -->
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
        <nav class="navigation navbar navbar-expand-md navbar-light">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav ml-auto mr-3">
              <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('about')}}">About</a>
              </li>
              <li class="nav-item {{ request()->is('our_rooms') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('our_rooms')}}">Our Room</a>
              </li>
              <li class="nav-item {{ request()->is('hotel_gallery') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('hotel_gallery')}}">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('my_bookings') }}">My Bookings</a>
              </li>

              {{-- Auth Section --}}
              @if (Route::has('login'))
                @auth
                
                  <li class="nav-item">
                    <span class="nav-link username">
                      <i class="fa fa-paw paw-icon"></i>
                      Hi, {{ Auth::user()->name }}
                      <i class="fa fa-paw paw-icon"></i>
                    </span>
                  </li>

                  <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="btn-btn-success">
                        Log out
                      </button>
                    </form>
                  </li>
                @else
                  <li class="nav-item" style="padding-right: 10px">
                    <a class="btn-btn-success" href="{{url('login')}}">Log in</a>
                  </li>
                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="btn-btn-primary" href="{{url('register')}}">Register</a>
                    </li>
                  @endif
                @endauth
              @endif
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
