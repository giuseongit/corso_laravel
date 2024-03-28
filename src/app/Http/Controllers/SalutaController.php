<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalutaController extends Controller
{
    public function salutaNome(string $name)
    {
        return "Ciao, {$name}!";
    }
}
