<?php

namespace App\Http\Controllers;

use App\Models\CasaTransito;
use Illuminate\Http\Request;

class CasaTransitoController extends Controller
{
    public function index()
    {
        return response()->json(CasaTransito::with('rescatista', 'animales')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'rescatista_id' => 'required|exists:personas,id',
        ]);

        $casa = CasaTransito::create($request->all());
        return response()->json($casa, 201);
    }

    public function show(CasaTransito $casasTransito)
    {
        return response()->json($casasTransito->load('rescatista', 'animales'));
    }

    public function update(Request $request, CasaTransito $casasTransito)
    {
        $casasTransito->update($request->all());
        return response()->json($casasTransito);
    }

    public function destroy(CasaTransito $casasTransito)
    {
        $casasTransito->delete();
        return response()->json(['mensaje' => 'Casa de transito eliminada']);
    }
}