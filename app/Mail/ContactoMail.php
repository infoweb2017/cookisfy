<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contacto;

    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }
    public function build()
    {
        return $this->view('emails.contacto')
            ->subject('Nueva consulta de contacto'); // Asunto del correo electrónico
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contacto Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contacto',
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
