<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactoNotification extends Notification
{
    use Queueable;
    protected $contacto;

    /**
     * Create a new notification instance.
     */
    // En la clase ContactoNotification
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }

    // Luego, en el método toMail o toDatabaseNotification
    public function toMail($notifiable)
    {
        // Accede al objeto $contacto usando $this->contacto
        $contacto = $this->contacto;

        return (new MailMessage)
            ->line('Nueva consulta de contacto:')
            ->line('Nombre: ' . $contacto->nombre)
            ->line('Correo: ' . $contacto->correo)
            ->line('Teléfono: ' . $contacto->telefono)
            ->line('Consulta: ' . $contacto->consulta)
            ->action('Ver Consulta', route('consulta', $this->contacto->id))
            ->line('Gracias por usar nuestra aplicación!');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
