<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;
use Illuminate\Http\JsonResponse;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Film::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        $valid = $request->validated();
        $p = Film::create($valid);
        return response()->json($p, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return $this->showFilm($film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $valid = $request->validated();
        $film->update($valid);
        return $this->showFilm($film);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }

    private function showFilm(Film $film)
    {
        //$registaNome = "unknown";
//        $regista = $film->regista;
//        if ($regista) {
//            $registaNome = $regista->nome;
//        }
        return response()->json([
            'id' => $film->id,
            'titolo' => $film->titolo,
            'trama' => $film->trama,
            'anno' => $film->anno,
            'created_at' => $film->created_at,
            'updated_at' => $film->updated_at,
            //'regista' => $registaNome
        ]);
    }
}
