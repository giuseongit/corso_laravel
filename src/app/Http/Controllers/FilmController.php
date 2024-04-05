<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        return \response()->json([
            'success' => true,
            'data' => Film::all(),
        ]);
    }

    public function store(StoreFilmRequest $request)
    {
        $film = Film::create(
            $request->validated()
        );

        return \response()->json([
            'success' => true,
            'data' => $film,
        ]);
    }
}
