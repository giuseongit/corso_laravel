<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index()
    {
        return \response()->json([
            'success' => true,
            'data' => Director::all(),
        ]);
    }

    public function show(Director $director)
    {
        return \response()->json([
            'success' => true,
            'data' => $director,
        ]);
    }


    public function store(StoreDirectorRequest $request)
    {
        $director = Director::create($request->validated());

        return \response()->json([
            'success' => true,
            'data' => $director,
        ]);
    }

    public function update(UpdateDirectorRequest $request, Director $director)
    {
        $director->update($request->validated());

        return \response()->json([
            'success' => true,
            'data' => $director,
        ]);
    }

    public function destroy(Director $director)
    {
        $director->delete();

        return \response()->json([
            'success' => true,
            'data' => [],
        ]);
    }

    public function films(Director $director)
    {
        return \response()->json([
            'success' => true,
            'data' => $director->films,
        ]);
    }
}
