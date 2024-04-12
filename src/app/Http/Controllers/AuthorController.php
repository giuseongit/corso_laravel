<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use Symfony\Component\HttpFoundation\Response as HttpCode;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(
            Author::all(),
            HttpCode::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request): JsonResponse
    {
        return new JsonResponse(
            Author::create($request->validated()),
            HttpCode::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author): JsonResponse
    {
        return new JsonResponse(
            $author,
            HttpCode::HTTP_FOUND
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        $author->update($request->validated());

        return new JsonResponse(
            $author,
            HttpCode::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): JsonResponse
    {
        $author->delete();

        return new JsonResponse(
            [
                'result' => true,
            ],
            HttpCode::HTTP_OK
        );
    }
}
