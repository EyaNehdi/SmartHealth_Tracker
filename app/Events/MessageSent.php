<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use App\Models\Message;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message->load('sender');
    }

    public function broadcastOn()
    {
        if ($this->message->challenge_id) {
            return new PresenceChannel('challenge.' . $this->message->challenge_id);
        } else {
            return new PrivateChannel('user.' . $this->message->to_user_id);
        }
    }

    public function broadcastWith()
    {
        return [
            'body' => $this->message->body,
            'sender' => [
                'id' => $this->message->from_user_id,
                'name' => $this->message->sender->name
            ]
        ];
    }
}
