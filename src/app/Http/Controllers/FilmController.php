<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreFilmRequest;
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
}
