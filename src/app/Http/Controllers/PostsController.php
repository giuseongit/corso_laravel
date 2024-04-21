<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        // carica tutti gli elementi dal database
        return Posts::all();
    }

    public function store(StorePostsRequest $request)
    {
        $valid = $request->validated();
        $p = Posts::create($valid);
        return response()->json($p, 201);
    }

    public function show(Posts $post)
    {
        return response()->json($post);
    }

    public function update(UpdatePostsRequest $request, Posts $post)
    {
        $validated = $request->validated();
        $post->update($validated);
        return response()->json($post);
    }

    public function destroy(Posts $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}