<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNewSubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscribeEmail;
    /**
     * Create a new message instance.
     */
    public function __construct($email)
    {
        $this->subscribeEmail = $email;
    }

    public function build()
    {
        return $this->view('emails.adminNuevaSubscripcion')
                    ->subject('Nueva Suscripción')
                    ->with(['email' => $this->subscribeEmail]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Correo de nuevo suscriptor',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.adminNuevaSubscripcion',
        );
    }

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
