<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Regista extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function films(): HasMany
    {
        return $this->hasMany(Film::class);
    }
}
