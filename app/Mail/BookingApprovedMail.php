<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class BookingApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Booking is Approved 🎉',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_approved',
            with: [
                'booking' => $this->booking,
            ],
        );
        
    }

    public function attachments(): array
    {
        return [];
    }
}
