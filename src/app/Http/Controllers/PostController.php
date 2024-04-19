<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $valid = $request->validated();
        $p = Post::create($valid);
        return response()->json($p, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $this->showPost($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $valid = $request->validated();
        $post->update($valid);
        return $this->showPost($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

    private function showPost(Post $post)
    {
        $authorName = "unknown";
        $author = $post->author;
        if ($author) {
            $authorName = $author->name;
        }
        return response()->json([
            'id' => $post->id,
            'titolo' => $post->titolo,
            'corpo' => $post->corpo,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
            'author' => $authorName
        ]);
    }
}
