<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
      :root {
        --primary-color: #4A90E2;
        --card-bg: #ffffff;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      }

      .mail-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
      }

      .mail-card {
        background: var(--card-bg);
        box-shadow: var(--card-shadow);
        border-radius: 10px;
        padding: 30px;
        max-width: 700px;
        width: 100%;
      }

      .mail-card h1 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 25px;
      }

      .form-group {
        margin-bottom: 20px;
        text-align: left;
      }

      .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #333;
      }

      .form-group input,
      .form-group textarea {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 10px;
        font-size: 15px;
      }

      .form-group textarea {
        resize: vertical;
      }

      .btn-submit {
        display: block;
        width: 100%;
        background: var(--primary-color);
        color: #fff;
        font-weight: 600;
        padding: 12px;
        border-radius: 6px;
        transition: background 0.2s ease;
        border: none;
      }

      .btn-submit:hover {
        background: #357ABD;
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.slidebar')

    {{-- body start --}}
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <div class="mail-container">
            <div class="mail-card">
              <h1>Mail send to {{ $data->name }}</h1>

              <form action="{{ url('mail', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="greeting">Greeting</label>
                  <input type="text" name="greeting" id="greeting">
                </div>

                <div class="form-group">
                  <label for="body">Mail Body</label>
                  <textarea name="body" id="body" rows="6"></textarea>
                </div>

                <div class="form-group">
                  <label for="action_text">Action Text</label>
                  <input type="text" name="action_text" id="action_text">
                </div>

                <div class="form-group">
                  <label for="action_url">Action URL</label>
                  <input type="text" name="action_url" id="action_url">
                </div>

                <div class="form-group">
                  <label for="endline">End Line</label>
                  <input type="text" name="endline" id="endline">
                </div>

                <button type="submit" class="btn-submit">
                  <i class="fa fa-paper-plane"></i> Send Mail
                </button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    {{-- end body --}}
    
    @include('admin.footer')
  </body>
</html>
