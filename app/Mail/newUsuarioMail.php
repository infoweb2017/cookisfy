<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class newUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
    public function build()
    {
        return $this->view('emails.usuario')
            ->subject('Nueva usuario'); // Asunto del correo electrónico
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo Usuario Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user',
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
