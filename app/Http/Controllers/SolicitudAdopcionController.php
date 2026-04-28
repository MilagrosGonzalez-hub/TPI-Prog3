<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAdopcion;
use Illuminate\Http\Request;

class SolicitudAdopcionController extends Controller
{
    public function index()
    {
        return response()->json(SolicitudAdopcion::with('animal', 'adoptante')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animales,id',
            'adoptante_id' => 'required|exists:personas,id',
            'mensaje' => 'nullable|string',
        ]);

        $solicitud = SolicitudAdopcion::create($request->all());
        return response()->json($solicitud->load('animal', 'adoptante'), 201);
    }

    public function show(SolicitudAdopcion $solicitudesAdopcion)
    {
        return response()->json($solicitudesAdopcion->load('animal', 'adoptante'));
    }

    public function update(Request $request, SolicitudAdopcion $solicitudesAdopcion)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,aceptada,rechazada',
        ]);

        $solicitudesAdopcion->update($request->only('estado'));
        return response()->json($solicitudesAdopcion);
    }

    public function destroy(SolicitudAdopcion $solicitudesAdopcion)
    {
        $solicitudesAdopcion->delete();
        return response()->json(['mensaje' => 'Solicitud eliminada']);
    }
}