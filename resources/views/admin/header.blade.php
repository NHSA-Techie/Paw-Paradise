<header class="header shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <button type="button" id="sidebarToggle" class="btn btn-sm btn-primary mr-3 d-lg-none">
                    <i class="fa fa-bars"></i>
                </button>

                <a href="#" class="navbar-brand d-flex align-items-center mr-3">
                    <span class="brand-text brand-big visible text-uppercase">
                        <strong class="dashtext-1">PawParadise</strong><strong>Hotel</strong>
                    </span>
                </a>
            </div>

            <div class="d-flex align-items-center">
                <span class="text-light mr-3 d-none d-md-inline">
                    Welcome to Admin dashboard ! ,
                    <strong class="dashtext-1">{{ Auth::user()->name }}</strong>
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

<div id="sidebarOverlay"></div>

<script>
window.addEventListener('load', function () {
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (!toggleBtn || !sidebar || !overlay) return;

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('show-mobile');
        overlay.classList.toggle('show-mobile');
    });

    overlay.addEventListener('click', function () {
        sidebar.classList.remove('show-mobile');
        overlay.classList.remove('show-mobile');
    });
});
</script>