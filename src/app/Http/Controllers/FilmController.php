<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return response()->json($films);
    }

    public function store(StoreFilmRequest $request)
    {
        $film = Film::create(
            $request->validated()
        );

        return response()->json($film, 201);
    }
}
