<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;
 
    public $actionUrl;
    
    public function __construct($token)
    {
        $this->actionUrl = url( "/welcome?token=" . $token . "&modal_password=true");
    }
 
    public function via($notifiable)
    {
        return ['mail'];
    }
 
    public function toMail($notifiable)
    {
        $this->actionUrl .= "&email=" . $notifiable->email;
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $this->actionUrl)
            ->line('If you did not request a password reset, no further action is required.');
    }
 
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    // public function toMail( $notifiable ) {
    //     $link = url( "/welcome?token=" . $this->token . "&modal_password=true". "&email=" . $notifiable->email );
     
    //     return ( new MailMessage )
    //        ->subject( 'Modificar contraseña' )
    //        ->line( "Has recibido este email por que nos ha llegado una notificacion de cambio de contraseña." )
    //        ->action( 'Cambiar contraseña', $link )
    //        ->line( 'Gracias!' );
    //  }

}
