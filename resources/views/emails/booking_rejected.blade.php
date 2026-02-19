<h2>Booking Rejected ❌</h2>

<p>Hello {{ $booking->name }},</p>

<p>Unfortunately your booking for <b>{{ $booking->room->room_title }}</b> was rejected.</p>

<p>Arrival: {{ $booking->start_date }}</p>
<p>Leaving: {{ $booking->end_date }}</p>

<p>Please try another date or contact us.</p>

<p>– Paws Paradise 🐾</p>
