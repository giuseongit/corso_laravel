<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = [
        'title',
        'description',
        'year',
        'director_id',
    ];

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }
}
