<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registrazione;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \response()->json([
            'success' => true,
            'data' => Film::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        $film = Film::create(
            $request->validated()
        );

        return \response()->json([
            'data' => $film,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return \response()->json($film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $valid = $request->validated();
        $film->update($valid);
        return $this->show($film);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }

}
