<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportSession extends Model
{
    use HasFactory;

    protected $fillable = ['session_data'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
