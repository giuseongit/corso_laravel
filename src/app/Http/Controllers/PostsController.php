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
        return $this->showPost($post);
    }

    public function update(UpdatePostsRequest $request, Posts $post)
    {
        $valid = $request->validated();
        $post->update($valid);
        return $this->showPost($post);
    }

    public function destroy(Posts $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

    private function showPost(Posts $post)
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
