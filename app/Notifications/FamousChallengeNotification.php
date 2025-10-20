<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Challenge;

class FamousChallengeNotification extends Notification
{
    use Queueable;

    protected $challenge;

    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Un challenge est devenu Célèbre !')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Le challenge **' . $this->challenge->titre . '** a été marqué comme Célèbre dans SmartHealth Tracker !')
            ->line('Rejoignez ou consultez ce challenge populaire pour participer à l’aventure.')
            ->action('Voir le Challenge', route('challenges.index'))
            ->line('Merci de faire partie de notre communauté !');
    }

    public function toArray($notifiable)
    {
        return [
            'challenge_id' => $this->challenge->id,
            'title' => $this->challenge->titre,
            'message' => 'Le challenge ' . $this->challenge->titre . ' a été marqué comme Célèbre !',
            'url' => route('challenges.index'),
        ];
    }
}
