<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Regista extends Model
{
    use HasFactory;

    protected $film = 'regista';

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
}
