<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Ensure this class exists in the specified namespace

class Participation extends Model
{
    protected $fillable = ['challenge_id', 'user_id', 'comment', 'image' , 'participant_reply' ,'reply'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


