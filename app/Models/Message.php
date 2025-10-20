<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user_id', 'to_user_id', 'challenge_id', 'body'];

    public function sender() { return $this->belongsTo(User::class, 'from_user_id'); }
    public function recipient() { return $this->belongsTo(User::class, 'to_user_id'); }
    public function challenge() { return $this->belongsTo(Challenge::class); } // New relationship
}
