<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(StoreAuthorRequest $request)
    {
        $valid = $request->validated();
        $author = Author::create($valid);
        return response()->json($author, 201);
    }

    public function show(Author $author)
    {
        return response()->json($author);
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $validated = $request->validated();
        $author->update($validated);
        return response()->json($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(null, 204);
    }

    public function posts(Author $author)
    {
        return response()->json($author->posts);
    }
}
