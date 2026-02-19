<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->

        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">

          
                <!-- Dashboard link -->
                <li>
                  <a href="{{ url('dashboard') }}">
                    <i class="fa fa-tachometer"></i> Dashboard
                  </a>
                </li>
                
                <li>
                  <a href="javascript:void(0)" class="disabled-link">
                    <i class="fa fa-bed"></i> Rooms
                  </a>
                  <ul id="exampledropdownDropdown" class="list-unstyled">
                    <li><a href="{{ url('create_room') }}"><i class="fa fa-plus"></i> Add Rooms</a></li>
                    <li><a href="{{ url('view_room') }}"><i class="fa fa-eye"></i> View Rooms</a></li>
                  </ul>
                </li>


                <li>
                  <a href="{{ url('bookings') }}">
                    <i class="fa fa-calendar-check-o"></i> Bookings
                  </a>
                </li>

                <li>
                  <a href="{{ url('view_gallary') }}">
                    <i class="fa fa-image"></i> Gallery
                  </a>
                </li>

                <li>
                  <a href="{{ url('all_messages') }}">
                    <i class="fa fa-envelope"></i> Messages
                  </a>
                </li>

                
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      