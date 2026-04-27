<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = [
        'nombre_completo',
        'dni',
        'telefono',
        'direccion',
        'tipo',
    ];

    public function animales()
    {
        return $this->hasMany(Animal::class, 'rescatista_id');
    }

    public function casasTransito()
    {
        return $this->hasMany(CasaTransito::class, 'rescatista_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudAdopcion::class, 'adoptante_id');
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'rescatista_id');
    }
}