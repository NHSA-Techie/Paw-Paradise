<!DOCTYPE html>
<html lang="en">
<head>
   <base href="/public">
   @include('home.css')
   {{-- Bootstrap CSS CDN --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <style>
      label { display:block; font-weight:600; margin-bottom:6px; }
      input, textarea { width:100%; padding:8px 10px; border:1px solid #ddd; border-radius:6px; }
      .card-room { border-radius:14px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.1); }
      .card-room img { width:100%; height:300px; object-fit:cover; }
      .card-room .card-body { padding:20px; }
      .card-room h2 { font-weight:700; margin-bottom:12px; }
      .card-room p { margin-bottom:10px; color:#444; }
      .booking-box { background:#f9fafb; border-radius:14px; padding:24px; box-shadow:0 4px 12px rgba(0,0,0,.08); }
      .booking-box h1 { font-size:28px; font-weight:700; margin-bottom:20px; }
      .send-btn { background:linear-gradient(135deg,#4A90E2,#9013FE); border:none; padding:12px 20px; border-radius:8px; color:#fff; font-weight:600; cursor:pointer; transition:.2s; }
      .send-btn:hover { opacity:.9; transform:translateY(-2px); }
   </style>
</head>

<body class="main-layout">
   <!-- Loader -->
   <!-- loader -->
   <div class="loader_bg">
      <div class="paw-loader">
         <span>🐾</span><span>🐾</span><span>🐾</span>
      </div>
   </div>
<!-- end loader -->


   <!-- Header -->
   <header>@include('home.header')</header>

   <!-- Room Details -->
   <section class="our_room py-5">
      <div class="container">
         <div class="row g-4">
            <!-- Room Info -->
            <div class="col-md-8">
               <div class="card-room">
                  <img src="{{ asset('room/'.$room->images) }}" alt="{{ $room->room_title }}">
                  <div class="card-body">
                     <h2>{{ $room->room_title }}</h2>
                     <p>{{ $room->description }}</p>
                     <h5>Room Type: <span class="fw-normal">{{ $room->room_type }}</span></h5>

                     <h4 class="text-primary mt-3">Price: {{ $room->price }} ฿</h4>
                  </div>
               </div>
            </div>

            <!-- Booking Form -->
            <div class="col-md-4">
               <div class="booking-box">
                  <h1>Book Room</h1>

                  {{-- Flash message --}}
                  @if (session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
                  @endif

                  {{-- Validation errors --}}
                  @if($errors)
                     <ul class="mb-3">
                        @foreach ($errors->all() as $errors)
                           <li style="color:red;">{{ $errors }}</li>
                        @endforeach
                     </ul>
                  @endif

                  {{-- Booking form --}}
                  <form action="{{ url('add_booking',$room->id) }}" method="POST">
                     @csrf

                     <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" 
                               @if(Auth::id()) value="{{ Auth::user()->name }}" @endif>
                     </div>

                     <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" 
                               @if(Auth::id()) value="{{ Auth::user()->email }}" @endif>
                     </div>

                     <div class="mb-3">
                        <label>Phone</label>
                        <input type="number" name="phone" 
                               @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif>
                     </div>

                     <div class="mb-3">
                        <label>Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                     </div>

                     <div class="mb-3">
                        <label>End Date</label>
                        <input type="date" name="endDate" id="endDate">
                     </div>

                     <div class="mt-4">
                        <button type="submit" class="send-btn w-100">Book Room</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Footer -->
   @include('home.footer')

   {{-- Bootstrap JS --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
           integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
           crossorigin="anonymous"></script>

   <script>
      $(function(){
         var dtToday = new Date();
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if(month < 10) month = '0' + month;
         if(day < 10) day = '0' + day;
         var maxDate = year + '-' + month + '-' + day;
         $('#startDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);
      });
   </script>
</body>
</html>
