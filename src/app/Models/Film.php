<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author_id',
        'description',
        'release_year',
    ];

    // ------------------
    //  Relationships
    // ------------------
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
