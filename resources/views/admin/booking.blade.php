<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css"> 
      :root {
        --table-header-bg: #4A90E2;
        --table-header-text: #fff;
        --table-row-bg: #ffffff;
        --table-row-hover: #f8f9fa; /* light gray hover */
        --table-border: #e5e7eb;

        --status-approved-bg: #d4edda;
        --status-approved-text: #155724;

        --status-rejected-bg: #f8d7da;
        --status-rejected-text: #721c24;

        --status-waiting-bg: #fff3cd;
        --status-waiting-text: #856404;

        --status-unpaid-bg: #e2e3e5;
        --status-unpaid-text: #41464b;
      }

      h1.page-title {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #4A90E2;
      }

      .booking-table {
        margin-top: 30px;
      }

      .booking-table th {
        background: var(--table-header-bg);
        color: var(--table-header-text);
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
      }

      .booking-table td {
        vertical-align: middle;
        text-align: center;
        background: var(--table-row-bg);
        border-color: var(--table-border);
        transition: background 0.2s ease;
      }

      /* Hover effect */
      .booking-table tbody tr:hover td {
        background: var(--table-row-hover);
      }

      .booking-table img {
        border-radius: 6px;
        object-fit: cover;
        height: 80px;
      }

      /* Status badges */
      .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
        white-space: nowrap;
      }
      .status-approved {
        background: var(--status-approved-bg);
        color: var(--status-approved-text);
      }
      .status-rejected {
        background: var(--status-rejected-bg);
        color: var(--status-rejected-text);
      }
      .status-waiting {
        background: var(--status-waiting-bg);
        color: var(--status-waiting-text);
      }
      .status-unpaid {
        background: var(--status-unpaid-bg);
        color: var(--status-unpaid-text);
      }

      /* Action buttons */
      .action-btns a {
        margin: 2px;
        white-space: nowrap;
      }

      /* Responsive container */
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

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <h1 class="page-title text-center">Booking Management</h1>

          {{-- show message --}}
          @if (session()->has('message'))
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
          @endif

          <div class="table-responsive booking-table">
            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>Room ID</th>
                  <th>Customer</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Arrival Date</th>
                  <th>Leaving Date</th>
                  <th>Status</th>

                  <th>Payment</th>
                  <th>Slip</th>
                  <th>Verify</th>

                  <th>Room Title</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Delete</th>
                  <th>Status Update</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($data as $data)
                <tr>
                  <td>{{ $data->room_id }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->phone }}</td>
                  <td>{{ $data->start_date }}</td>
                  <td>{{ $data->end_date }}</td>

                  {{-- Booking Status --}}
                  <td>
                    @if ($data->status == 'approve')  
                      <span class="status-badge status-approved">Approved</span>
                    @elseif ($data->status == 'rejected')
                      <span class="status-badge status-rejected">Rejected</span>
                    @else
                      <span class="status-badge status-waiting">Waiting</span>
                    @endif
                  </td>

                  {{-- Payment Status --}}
                  <td>
                    @if (($data->payment_status ?? 'unpaid') == 'paid')
                      <span class="status-badge status-approved">Paid</span>
                    @elseif (($data->payment_status ?? 'unpaid') == 'pending_verify')
                      <span class="status-badge status-waiting">Pending Verify</span>
                    @else
                      <span class="status-badge status-unpaid">Unpaid</span>
                    @endif
                  </td>

                  {{-- Slip View --}}
                  <td>
                    @if($data->payment_slip)
                      <a class="btn btn-sm btn-info"
                         target="_blank"
                         href="{{ asset('slips/'.$data->payment_slip) }}">
                        View Slip
                      </a>
                    @else
                      -
                    @endif
                  </td>

                  {{-- Verify Button --}}
                  <td>
                    @if(($data->payment_status ?? 'unpaid') == 'pending_verify')
                      <a class="btn btn-sm btn-success"
                         onclick="return confirm('Mark this booking as PAID?')"
                         href="{{ url('mark_paid', $data->id) }}">
                        Mark Paid
                      </a>
                    @else
                      -
                    @endif
                  </td>

                  <td>{{ $data->room->room_title }}</td>
                  <td>${{ $data->room->price }}</td>

                  <td>
                    <img src="{{ asset('room/'.$data->room->images) }}" width="120" alt="Room Image">
                  </td>

                  <td>
                    <a onclick="return confirm('Are you sure to delete this?');" 
                       class="btn btn-sm btn-danger" 
                       href="{{ url('delete_booking',$data->id) }}">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>

                  {{-- Existing approve/reject buttons (unchanged) --}}
                  <td class="action-btns">
                    <a class="btn btn-sm btn-success" href="{{ url('approve_book', $data->id) }}">
                      <i class="fa fa-check"></i> Approve
                    </a>
                    <a class="btn btn-sm btn-warning" href="{{ url('reject_book', $data->id) }}">
                      <i class="fa fa-times"></i> Reject
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

    @include('admin.footer')
  </body>
</html>
