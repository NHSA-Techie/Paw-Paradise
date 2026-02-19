<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css"> 
      :root {
        --table-header-bg: #4A90E2;
        --table-header-text: #fff;
        --table-row-bg: #ffffff;
        --table-row-hover: #f8f9fa;
        --table-border: #e5e7eb;
      }
      h1.page-title {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #4A90E2;
      }

      .messages-table {
        margin-top: 30px;
      }

      .messages-table th {
        background: var(--table-header-bg);
        color: var(--table-header-text);
        font-weight: 600;
        text-align: center;
        padding: 12px;
      }

      .messages-table td {
        background: var(--table-row-bg);
        text-align: center;
        padding: 12px;
        vertical-align: middle;
        border-color: var(--table-border);
        transition: background 0.2s ease;
      }

      .messages-table tbody tr:hover td {
        background: var(--table-row-hover);
      }

      /* Make message column more readable */
      .message-text {
        text-align: left;
        max-width: 400px;
        white-space: pre-line;
        word-wrap: break-word;
      }

      /* Send mail button styling */
      .btn-send {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        font-weight: 600;
        border-radius: 20px;
        padding: 6px 14px;
        transition: background 0.2s ease;
      }
      .btn-send:hover {
        background-color: #218838;
        border-color: #1e7e34;
        color: #fff;
      }

      /* Delete button styling */
      .btn-delete {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        font-weight: 600;
        border-radius: 20px;
        padding: 6px 14px;
        transition: background 0.2s ease;
      }
      .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: #fff;
      }

      /* Responsive */
      .table-responsive {
        border-radius: 8px;
        overflow-x: auto;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        background: #fff;
        padding: 10px;
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

          <!-- Page Title -->
          <h1 class="page-title text-center">Messages</h1>

          <div class="table-responsive messages-table">
            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Send Email</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $data)
                <tr>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->phone }}</td>
                  <td class="message-text">{{ $data->message }}</td>
                  <td>
                    <a class="btn btn-send" href="{{ url('send_mail',$data->id) }}">
                      <i class="fa fa-envelope"></i> Send Mail
                    </a>
                  </td>
                  <td>
                    <a onclick="return confirm('Are you sure you want to delete this message?');"
                       class="btn btn-delete" href="{{ url('delete_message',$data->id) }}">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    {{-- body end --}}
    
    @include('admin.footer')
  </body>
</html>
