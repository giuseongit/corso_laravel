<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articolo;
use App\Http\Requests\StoreArticoloRequest;

class ArticoloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articoli = Articolo:: getArticoliEsempio();
        return response()->json($articoli);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticoloRequest $request)
    {
        $articolo = Articolo::createExample($request->validated());
        return response()->json($articolo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
