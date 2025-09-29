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
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function typeEvent()
    {
        return $this->belongsTo(TypeEvent::class);
    }

    // Champs calculés pour l'analyse temporelle

    // Nombre de jours avant l'événement
    public function getDaysUntilEventAttribute()
    {
        return Carbon::parse($this->date)->diffInDays(now());
    }

    // Mois de l'événement
    public function getMonthAttribute()
    {
        return Carbon::parse($this->date)->format('F'); // "January", "February", ...
    }

    // Trimestre de l'événement
    public function getQuarterAttribute()
    {
        return ceil(Carbon::parse($this->date)->month / 3);
    }

    // Jour de la semaine
    public function getWeekDayAttribute()
    {
        return Carbon::parse($this->date)->format('l'); // "Monday", "Tuesday", ...
    }
}
