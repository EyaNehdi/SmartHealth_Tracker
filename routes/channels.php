<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Challenge;
use Illuminate\Support\Facades\Log;

Broadcast::routes(['middleware' => ['web', 'auth']]);

Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('challenge.{challengeId}', function ($user, $challengeId) {
    Log::info('Authorizing channel', [
        'user_id' => $user ? $user->id : null,
        'challenge_id' => $challengeId
    ]);

    if (!$user) {
        Log::error('User not authenticated for channel authorization');
        return false;
    }

    $challenge = Challenge::findOrFail($challengeId);
    $isParticipant = $challenge->isParticipatedBy($user->id);

    Log::info('Channel authorization result', [
        'user_id' => $user->id,
        'challenge_id' => $challengeId,
        'is_participant' => $isParticipant
    ]);

    return $isParticipant ? ['id' => $user->id, 'name' => $user->name] : false;
});
