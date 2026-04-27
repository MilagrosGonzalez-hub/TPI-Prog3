<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $rescatista = Persona::create([
            'nombre_completo' => 'Maria Garcia',
            'dni' => '12345678',
            'telefono' => '3624123456',
            'direccion' => 'Av. Belgrano 123, Resistencia',
            'tipo' => 'rescatista',
        ]);

        Animal::create([
            'nombre' => 'Firulais',
            'especie' => 'perro',
            'edad' => 2,
            'tamano' => 'mediano',
            'estado' => 'disponible',
            'zona' => 'Resistencia',
            'descripcion' => 'Perro muy tranquilo y cariñoso',
            'rescatista_id' => $rescatista->id,
        ]);

        Animal::create([
            'nombre' => 'Luna',
            'especie' => 'gato',
            'edad' => 1,
            'tamano' => 'chico',
            'estado' => 'disponible',
            'zona' => 'Barranqueras',
            'descripcion' => 'Gatita juguetona, muy sociable',
            'rescatista_id' => $rescatista->id,
        ]);

        Animal::create([
            'nombre' => 'Rex',
            'especie' => 'perro',
            'edad' => 4,
            'tamano' => 'grande',
            'estado' => 'disponible',
            'zona' => 'Resistencia',
            'descripcion' => 'Perro grande, ideal para casa con patio',
            'rescatista_id' => $rescatista->id,
        ]);
    }
}