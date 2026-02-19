<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        :root {
        --btn-color: #7ED321;   /* green */
        --btn-hover: #5ea917;   /* darker green */
        }
        
        .form-card {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .form-card h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #0056d6;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #444;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            border-radius: 6px;
        }

        .btn-submit {
            margin-top: 15px;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-submit {
        background-color: var(--btn-color) !important;
        border-color: var(--btn-color) !important;
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
          <h1>Add Room</h1>

          <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title">Room Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter room title">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter room description"></textarea>
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" class="form-control" placeholder="Enter price">
            </div>

            <div class="form-group">
              <label for="type">Room Type</label>
              <select name="type" id="type" class="form-control">
                <option selected value="standard">Standard</option>
                <option value="premium">Premium</option>
                <option value="luxury">Luxury</option>
                <option value="family">Family</option>
                <option value="playroom">Play Room</option>
              </select>
            </div>

            <div class="form-group">
              <label for="image">Upload Image</label>
              <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary btn-submit">
              <i class="fa fa-plus-circle"></i> Add Room
            </button>
          </form>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
