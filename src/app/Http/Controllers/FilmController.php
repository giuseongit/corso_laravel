<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UpdateFilmRequest;
use Symfony\Component\HttpFoundation\Response as HttpCode;

class FilmController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(
            Film::all(),
            HttpCode::HTTP_OK
        );
    }

    public function store(StoreFilmRequest $request): JsonResponse
    {
        return new JsonResponse(
            Film::create($request->validated()),
            HttpCode::HTTP_CREATED
        );
    }

    public function show(Film $film): JsonResponse
    {
        return new JsonResponse(
            $film,
            HttpCode::HTTP_FOUND
        );
    }

    public function update(UpdateFilmRequest $request, Film $film): JsonResponse
    {
        $film->update($request->validated());

        return new JsonResponse(
            $film,
            HttpCode::HTTP_OK
        );
    }

    public function destroy(Film $film): JsonResponse
    {
        $film->delete();

        return new JsonResponse(
            [
                'result' => true,
            ],
            HttpCode::HTTP_OK
        );
    }
}
