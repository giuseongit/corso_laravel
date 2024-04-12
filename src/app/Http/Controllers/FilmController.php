<?php

namespace App\Http\Controllers;

use App\Http\Requests\Films\StoreFilmRequest;
use App\Http\Requests\Films\UpdateFilmRequest;
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
        $film = Film::create($request->validated());

        return \response()->json([
            'success' => true,
            'data' => $film,
        ]);
    }

    public function update(UpdateFilmRequest $request, Film $film)
    {
        $film->update($request->validated());

        return \response()->json([
            'success' => true,
            'data' => $film,
        ]);
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return \response()->json([
            'success' => true,
            'data' => [],
        ]);
    }
}
