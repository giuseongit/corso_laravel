<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalutoController extends Controller
{
    public function salutaNome($nome): string
    {
        return "Ciao, $nome!";
    }
}
