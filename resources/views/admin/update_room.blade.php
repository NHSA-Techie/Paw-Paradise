<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style type="text/css"> 
      /* ===== Theme Variables ===== */
      :root {
        --btn-bg:#7ED321;    /* Primary button color */
        --btn-hover: #5ea917; /* Hover color */
        --title-color: #0056d6;
        --card-bg: #ffffff;
        --card-border: #e5e7eb;
        --label-color: #444;
      }

      /* ===== Form Card Styling ===== */
      .form-card {
        max-width: 700px;
        margin: 40px auto;
        background: var(--card-bg);
        padding: 30px;
        border-radius: 10px;
        border: 1px solid var(--card-border);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      }

      .form-card h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--title-color);
        text-align: center;
      }

      .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: var(--label-color);
      }

      .form-group input,
      .form-group textarea,
      .form-group select {
        border-radius: 6px;
      }

      /* Current image preview */
      .current-image {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 15px;
      }

      .current-image img {
        margin-top: 10px;
        border-radius: 6px;
        border: 1px solid #ddd;
      }

      /* Custom Button */
      .btn-submit {
        margin-top: 15px;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 6px;
        background-color: var(--btn-bg) !important;
        border-color: var(--btn-bg) !important;
        color: #fff !important;
      }

      .btn-submit:hover {
        background-color: var(--btn-hover) !important;
        border-color: var(--btn-hover) !important;
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
      <div class="container-fluid">
        <div class="form-card">
          <h1>Update Room</h1>

          <form action="{{ url('edit_room',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title">Room Title</label>
              <input type="text" name="title" id="title" value="{{ $data->room_title }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" rows="4" class="form-control">{{ $data->description }}</textarea>
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" value="{{ $data->price }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="type">Room Type</label>
              <select name="type" id="type" class="form-control">
                <option selected value="{{ $data->room_type }}">{{ ucfirst($data->room_type) }}</option>
                <option value="regular">Regular</option>
                <option value="premium">Premium</option>
                <option value="deluxe">Deluxe</option>
              </select>
            </div>

            <div class="current-image">
              <label>Current Image</label>
              <img width="120" src="/room/{{ $data->images }}" alt="Current Room Image">
            </div>

            <div class="form-group">
              <label for="image">Upload New Image</label>
              <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-submit">
              <i class="fa fa-refresh"></i> Update Room
            </button>
          </form>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
