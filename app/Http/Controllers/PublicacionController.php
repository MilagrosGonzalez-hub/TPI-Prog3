<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        return response()->json(Publicacion::with('rescatista')->orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'rescatista_id' => 'required|exists:personas,id',
            'texto' => 'required|string',
            'imagen_url' => 'nullable|string',
        ]);

        $publicacion = Publicacion::create($request->all());
        return response()->json($publicacion->load('rescatista'), 201);
    }

    public function show(Publicacion $publicacion)
    {
        return response()->json($publicacion->load('rescatista'));
    }

    public function update(Request $request, Publicacion $publicacion)
    {
        $publicacion->update($request->all());
        return response()->json($publicacion);
    }

    public function destroy(Publicacion $publicacion)
    {
        $publicacion->delete();
        return response()->json(['mensaje' => 'Publicacion eliminada']);
    }
}