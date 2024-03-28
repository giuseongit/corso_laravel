<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getInfo()
    {
        return "Benvenuto nell'applicazione Laravel!";
    }
}
