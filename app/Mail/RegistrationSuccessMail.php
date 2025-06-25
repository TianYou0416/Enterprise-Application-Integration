<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $event;
    public $qrCode;

    public function __construct($name, $event)
    {
        $this->name = $name;
        $this->event = $event;
    

    // For Generate QR code
        $qrContent = "Event: {$event->title}\nDate: {$event->date}\nLocation: {$event->location}";

        $this->qrCode = QrCode::format('svg')->size(200)->generate($qrContent);
    }

        public function build()
    {
        return $this->subject('HypeHub Registration Confirmation')
                    ->view('emails.registration_success');
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registration Success Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
