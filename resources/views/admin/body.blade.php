<div class="page-content" style="background:#151515; color:#ddd;">
  <div class="page-header border-bottom" style="background:#1f1f1f;">
    <div class="container-fluid py-3">
      <h2 class="h5 text-gradient mb-0">🐾 Paws Paradise Admin Dashboard</h2>
    </div>
  </div>

  <section class="pt-4 pb-2">
    <div class="container-fluid">
      <div class="row g-3">

        <!-- Total Rooms -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block text-center p-4" 
               style="background:linear-gradient(145deg,#2a2a2a,#1a1a1a); border-radius:14px; box-shadow:0 4px 10px rgba(0,0,0,.3);">
            <div class="icon mb-2 text-gradient"><i class="icon-home"></i></div>
            <strong>Total Rooms</strong>
            <div class="number text-gradient mt-2" style="font-size:24px;">{{ $roomCount ?? '—' }}</div>
          </div>
        </div>

        <!-- Total Bookings -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block text-center p-4"
               style="background:linear-gradient(145deg,#272748,#1b1b2f); border-radius:14px; box-shadow:0 4px 10px rgba(0,0,0,.3);">
            <div class="icon mb-2 text-gradient"><i class="icon-calendar"></i></div>
            <strong>Total Bookings</strong>
            <div class="number text-gradient mt-2" style="font-size:24px;">{{ $bookingCount ?? '—' }}</div>
          </div>
        </div>

        <!-- Messages -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block text-center p-4"
               style="background:linear-gradient(145deg,#39273f,#1d1a25); border-radius:14px; box-shadow:0 4px 10px rgba(0,0,0,.3);">
            <div class="icon mb-2 text-gradient"><i class="icon-mail"></i></div>
            <strong>Messages</strong>
            <div class="number text-gradient mt-2" style="font-size:24px;">{{ $messageCount ?? '—' }}</div>
          </div>
        </div>

        <!-- Admins -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block text-center p-4"
               style="background:linear-gradient(145deg,#203b4d,#14232e); border-radius:14px; box-shadow:0 4px 10px rgba(0,0,0,.3);">
            <div class="icon mb-2 text-gradient"><i class="icon-user"></i></div>
            <strong>Admin Accounts</strong>
            <div class="number text-gradient mt-2" style="font-size:24px;">{{ $adminCount ?? '—' }}</div>
          </div>
        </div>

      </div>

      <!-- Welcome Panel -->
      <div class="block mt-5 p-4" 
           style="background:#1e1e1e; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,.25);">
        <h3 class="mb-3 text-gradient">Welcome Back, Admin</h3>
        <p style="color:#aaa;">
          Manage your pet hotel with ease!  
          Use the sidebar to <strong>add rooms</strong>, <strong>check bookings</strong>, and <strong>view messages</strong>.
        </p>

        <div class="mt-3">
          <a href="{{ url('view_room') }}" class="btn"
             style="background:linear-gradient(135deg,#4A90E2,#9013FE); color:#fff; border:none; border-radius:8px; padding:10px 20px; margin-right:10px;">
            <i class="icon-eye"></i> View All Rooms
          </a>

          <a href="{{ url('create_room') }}" class="btn"
             style="background:linear-gradient(135deg,#7ED321,#FF8C42); color:#111; border:none; border-radius:8px; padding:10px 20px;">
            <i class="icon-plus"></i> Add New Room
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Gradient text style -->
<style>
  .text-gradient {
    background: linear-gradient(135deg,#FF8C42,#9013FE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
</style>
