<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      :root {
        --gallery-card-bg: #fff;
        --gallery-border: #e5e7eb;
        --gallery-hover-shadow: rgba(0, 0, 0, 0.2);
      }

      h1.page-title {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #4A90E2;
      }

      .gallery-card {
        background: var(--gallery-card-bg);
        border: 1px solid var(--gallery-border);
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px var(--gallery-hover-shadow);
      }

      .gallery-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 6px;
        transition: transform 0.3s ease;
      }

      .gallery-card img:hover {
        transform: scale(1.05);
      }

      .gallery-card .btn {
        margin-top: 10px;
      }

      .upload-form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: inline-block;
        text-align: left;
      }

      .upload-form label {
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid text-center">

          <h1 class="page-title">Gallery</h1>

          {{-- images --}}
          <div class="row">
            @foreach ($gallary as $gallary)
              <div class="col-md-4">
                <div class="gallery-card">
                  <img src="/gallary/{{ $gallary->image }}" alt="Gallery Image">
                  <a class="btn btn-sm btn-danger" href="{{ url('delete_gallary', $gallary->id) }}">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </div>
              </div>
            @endforeach
          </div>
          {{-- end images --}}

          <form class="upload-form" action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control mb-3" required>
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-plus"></i> Add Image
            </button>
          </form>

        </div>
      </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>
