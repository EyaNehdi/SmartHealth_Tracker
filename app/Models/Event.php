<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEvent;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'date',
        'description',
        'type_event_id',
        'participants', // JSON pour stocker les IDs utilisateurs
    ];

    protected $casts = [
        'date' => 'date',
        'participants' => 'array', // Laravel convertit JSON <-> array
    ];

    public function typeEvent()
    {
        return $this->belongsTo(TypeEvent::class);
    }

    // Champs calculés pour analyse temporelle
    public function getDaysUntilEventAttribute()
    {
        return Carbon::parse($this->date)->diffInDays(now());
    }

    public function getMonthAttribute()
    {
        return Carbon::parse($this->date)->format('F');
    }

    public function getQuarterAttribute()
    {
        return ceil(Carbon::parse($this->date)->month / 3);
    }

    public function getWeekDayAttribute()
    {
        return Carbon::parse($this->date)->format('l');
    }

    // Nombre de participants
    public function getParticipantsCountAttribute()
    {
        return count($this->participants ?? []);
    }

    // Pourcentage de participation pour barre de progression
    public function getParticipationPercentAttribute()
    {
        $maxParticipants = 50; // ajuster selon tes besoins
        $count = $this->participants_count;
        return min(100, round(($count / $maxParticipants) * 100));
    }

    // Ajouter un participant
    public function addParticipant(int $userId)
    {
        $participants = $this->participants ?? [];

        if (!in_array($userId, $participants)) {
            $participants[] = $userId;
            $this->participants = $participants;
            $this->save();
        }
    }

    // Vérifier si utilisateur participe
    public function isParticipating(int $userId)
    {
        $participants = $this->participants ?? [];
        return in_array($userId, $participants);
    }
}
