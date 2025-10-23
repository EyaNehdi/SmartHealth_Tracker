<?php

namespace App\Mail;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminActivityPaidMail extends Mailable
{
    use Queueable, SerializesModels;

    public $activity;
    public $user;

    public function __construct(Activity $activity, User $user)
    {
        $this->activity = $activity;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('🧾 Nouveau paiement pour une activité')
                    ->view('emails.admin_activity_paid');
    }
}
