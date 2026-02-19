<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css"> 
      .room-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 30px;
      }

      .room-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: transform 0.2s ease-in-out;
      }

      .room-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 14px rgba(0,0,0,0.08);
      }

      .room-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
      }

      .room-body {
        padding: 15px;
        text-align: left;
      }

      .room-body h5 {
        font-size: 18px;
        font-weight: 700;
        color: #0056d6;
        margin-bottom: 8px;
      }

      .room-body p {
        font-size: 14px;
        color: #555;
        margin-bottom: 6px;
      }

      .room-actions {
        display: flex;
        justify-content: space-between;
        padding: 12px 15px;
        border-top: 1px solid #eee;
        background: #f9f9f9;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <div class="room-container">
            @foreach ($data as $data)
              <div class="room-card">
                <img src="room/{{$data->images}}" alt="Room Image">
                <div class="room-body">
                  <h5>{{ $data->room_title }}</h5>
                  <p><strong>Type:</strong> {{ $data->room_type }}</p>
                  <p><strong>Price:</strong> ฿{{ $data->price }}</p>
                  <p>{!! Str::limit($data->description, 100) !!}</p>
                </div>
                <div class="room-actions">
                  <a onclick="return confirm('Are you sure to delete this?')" 
                     href="{{ url('room_delete', $data->id) }}" 
                     class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                  <a href="{{ url('room_update', $data->id) }}" 
                     class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i> Update
                  </a>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
