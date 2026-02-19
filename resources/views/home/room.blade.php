<div class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage text-center">
               <h2>Our Room</h2>
               <p>Choose from our cozy, comfortable rooms designed with your pets in mind</p>
            </div>
         </div>
      </div>

      <div class="row">
         @foreach ($room as $rooms)
         <div class="col-md-4 col-sm-6 mb-4">
            <div class="room" id="serv_hover" style="border-radius:12px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.1); transition:transform .2s ease;">
               
               <!-- Room image -->
               <div class="room_img">
                  <figure style="margin:0;">
                     <img src="room/{{ $rooms->images }}" alt="{{ $rooms->room_title }}" style="width:100%; height:200px; object-fit:cover;">
                  </figure>
               </div>

               <!-- Room content -->
               <div class="bed_room" style="padding:16px; text-align:center;">
                  <h3 style="margin-bottom:8px; font-weight:700;">{{ $rooms->room_title }}</h3>
                  <p style="padding:0 10px; color:#555; min-height:60px;">
                     {!! Str::limit($rooms->description,100) !!}
                  </p>

                  <a href="{{ url('room_details',$rooms->id) }}" class="read_more" style="margin-top:12px; display:inline-block;">
                     Room Details
                  </a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
