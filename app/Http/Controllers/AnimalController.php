<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return response()->json(Animal::with('rescatista', 'casaTransito')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'especie' => 'required|in:perro,gato,otro',
            'rescatista_id' => 'required|exists:personas,id',
        ]);

        $animal = Animal::create($request->all());
        return response()->json($animal, 201);
    }

    public function show(Animal $animal)
    {
        return response()->json($animal->load('rescatista', 'casaTransito', 'solicitudes'));
    }

    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->all());
        return response()->json($animal);
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response()->json(['mensaje' => 'Animal eliminado']);
    }
}