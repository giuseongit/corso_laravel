<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'author_id',
        'titolo',
        'corpo',
        'autore'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
