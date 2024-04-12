<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistaRequest;
use App\Http\Requests\UpdateRegistaRequest;
use App\Models\Regista;

class RegistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Regista::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistaRequest $request)
    {
        $valid = $request->validated();
        $p = Regista::create($valid);
        return response()->json($p, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Regista $regista)
    {
        return $this->showRegista($film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistaRequest $request, Regista $regista)
    {
        $valid = $request->validated();
        $regista->update($valid);
        return $this->showRegista($regista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regista $regista)
    {
        $regista->delete();
        return response()->json(null, 204);
    }

    private function showRegista(Regista $regista)
    {
        return response()->json([
            'nome' => $regista->nome,
        ]);
    }
}
