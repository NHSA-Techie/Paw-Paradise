<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')

    {{-- bootstrap v5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="main-layout">

    <!-- loader -->
    <div class="loader_bg">
        <div class="paw-loader">
            <span>🐾</span><span>🐾</span><span>🐾</span>
        </div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header -->

    <!-- page content -->
    <div class="container" style="padding: 80px 0 60px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="titlepage text-center mb-4">
                    <h2>Pay for Booking</h2>
                    <p>Scan PromptPay QR and upload your payment slip</p>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="row g-4">

                    <!-- LEFT: Booking Info -->
                    <div class="col-md-6">
                        <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                            <h5 class="fw-bold mb-3">Booking Info</h5>

                            <div class="mb-2"><b>Room:</b> {{ $booking->room->room_title ?? '-' }}</div>
                            <div class="mb-2"><b>Arrival:</b> {{ $booking->start_date }}</div>
                            <div class="mb-2"><b>Leaving:</b> {{ $booking->end_date }}</div>
                            <div class="mb-2"><b>Status:</b>
                                @if($booking->status == 'approve')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($booking->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning text-dark">Waiting</span>
                                @endif
                            </div>

                            <div class="mb-2"><b>Payment:</b>
                                @if(($booking->payment_status ?? 'unpaid') == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @elseif(($booking->payment_status ?? 'unpaid') == 'pending_verify')
                                    <span class="badge bg-warning text-dark">Pending Verify</span>
                                @else
                                    <span class="badge bg-secondary">Unpaid</span>
                                @endif
                            </div>

                            <hr class="my-4">

                            <h6 class="fw-bold mb-2">How to Pay (PromptPay QR)</h6>
                            <ol class="mb-0">
                                <li>Scan the QR with your Thai banking app</li>
                                <li>Complete payment</li>
                                <li>Upload your payment slip</li>
                            </ol>
                        </div>
                    </div>

                    <!-- RIGHT: QR + Upload -->
                    <div class="col-md-6">
                        <div class="p-4 bg-white shadow-sm rounded-4 h-100 text-center">

                            <h5 class="fw-bold mb-3">Scan QR to Pay</h5>

                            <img
                                src="{{ asset('images/promptpay_qr.png') }}"
                                alt="PromptPay QR"
                                style="max-width: 320px; width:100%; border-radius:16px; border:1px solid #eee; padding:10px;"
                            >

                            <hr class="my-4">

                            <h6 class="fw-bold mb-3">Upload Payment Slip</h6>

                            @if(($booking->payment_status ?? 'unpaid') == 'pending_verify')
                                <div class="alert alert-warning text-start">
                                    Slip uploaded. Waiting for admin verification.
                                </div>
                            @endif

                            @if(($booking->payment_status ?? 'unpaid') == 'paid')
                                <div class="alert alert-success text-start">
                                    Payment verified ✅
                                </div>
                            @endif

                            <form action="{{ url('upload_slip', $booking->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="slip" class="form-control mb-3" required>

                                <button class="btn btn-primary px-4"
                                        type="submit"
                                        {{ (($booking->payment_status ?? 'unpaid') == 'paid') ? 'disabled' : '' }}>
                                    Upload Slip
                                </button>
                            </form>

                            @if($booking->payment_slip)
                                <p class="mt-3 mb-0">
                                    <b>Current slip:</b>
                                    <a target="_blank" href="{{ asset('slips/'.$booking->payment_slip) }}">View</a>
                                </p>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end page content -->

    <!-- footer -->
    @include('home.footer')
    <!-- end footer -->



</body>
</html>
