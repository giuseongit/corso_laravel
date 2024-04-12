<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Film extends Model
    {
        use HasFactory;

        protected $film = 'films';


        public function Regista(): HasMany
        {
            return $this->hasMany(Regista::class);
        }
    }
