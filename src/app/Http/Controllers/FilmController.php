<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $films = Film::all();
        return response()->json($films);
    }

    /**
     * @param StoreFilmRequest $request
     * @return JsonResponse
     */
    public function store(StoreFilmRequest $request): JsonResponse
    {
        $film = Film::create(
            $request->validated()
        );

        return response()->json($film, 201);
    }
}
