<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registrazione;
use App\Models\RegistrazioneModel;
use Illuminate\Http\Request;

class RegistrazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articolo = Registrazione::create($request->validated());
        return response()->json($articolo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrazioneModel $registrazioneModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrazioneModel $registrazioneModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistrazioneModel $registrazioneModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrazioneModel $registrazioneModel)
    {
        //
    }
}
