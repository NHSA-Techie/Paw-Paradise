<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="main-layout">

<header>
    @include('home.header')
</header>

<!-- Booking History Section -->
<div class="container mt-5 mb-5">

    <h2 class="text-center mb-4">My Booking History</h2>

    <div class="table-responsive">

        <table class="table table-bordered text-center align-middle">

            <thead class="table-dark">
                <tr>
                    <th>Room</th>
                    <th>Arrival</th>
                    <th>Leaving</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Pay</th>
                </tr>
            </thead>

            <tbody>
                @forelse($bookings as $b)
                <tr>
                    <td>{{ $b->room->room_title ?? '-' }}</td>
                    <td>{{ $b->start_date }}</td>
                    <td>{{ $b->end_date }}</td>

                    {{-- Booking Status --}}
                    <td>
                        @if($b->status == 'approve')
                            <span class="badge bg-success">Approved</span>
                        @elseif($b->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Waiting</span>
                        @endif
                    </td>

                    {{-- Payment Status --}}
                    <td>
                        @if(($b->payment_status ?? 'unpaid') == 'paid')
                            <span class="badge bg-success">Paid</span>
                        @elseif(($b->payment_status ?? 'unpaid') == 'pending_verify')
                            <span class="badge bg-warning text-dark">Pending Verify</span>
                        @else
                            <span class="badge bg-secondary">Unpaid</span>
                        @endif
                    </td>

                    {{-- Pay Now Button --}}
                    <td>
                        @if($b->status == 'approve' && ($b->payment_status ?? 'unpaid') == 'unpaid')
                            <a href="{{ url('pay_booking', $b->id) }}" class="btn btn-sm btn-primary">
                                Pay Now
                            </a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No bookings yet</td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@include('home.footer')

</body>
</html>
