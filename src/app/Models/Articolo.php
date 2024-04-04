<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articolo extends Model
{
    use HasFactory;

    public static function getArticoliEsempio()
    {
        return [
            [
                'id' => 1,
                'titolo' => 'Titolo articolo 1',
                'testo' => 'Testo articolo 1',
            ],
            [
                'id' => 2,
                'titolo' => 'Titolo articolo 2',
                'testo' => 'Testo articolo 2',
            ],
            [
                'id' => 3,
                'titolo' => 'Titolo articolo 3',
                'testo' => 'Testo articolo 3',
            ],
        ];
    }

    public static createExample($data) {
    
     
        $nuovoId = count(self::getArticoliEsempio()) + 1;
        $nuovoArticolo = [
            'id' => $nuovoId,
            'titolo' => $data['titolo'],
            'testo' => $data['testo'] ?? 'require', // Assumendo che 'testo' sia opzionale
        ];

        return $nuovoArticolo;
    }

}
