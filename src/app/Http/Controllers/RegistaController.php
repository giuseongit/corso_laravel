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
        return \response()->json([
            'success' => true,
            'data' => Regista::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistaRequest $request)
    {
        $regista = Regista::create(
            $request->validated()
        );

        return \response()->json([
            'data' => $regista,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Regista $regista)
    {
        return \response()->json($regista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistaRequest $request, Regista $regista)
    {
        $valid = $request->validated();
        $regista->update($valid);
        return $this->show($regista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regista $regista)
    {
        $regista->delete();
        return response()->json(null, 204);
    }
}
