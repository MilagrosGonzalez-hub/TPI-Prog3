<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'nombre',
        'especie',
        'edad',
        'tamano',
        'estado',
        'zona',
        'descripcion',
        'rescatista_id',
        'casa_transito_id',
    ];

    public function rescatista()
    {
        return $this->belongsTo(Persona::class, 'rescatista_id');
    }

    public function casaTransito()
    {
        return $this->belongsTo(CasaTransito::class, 'casa_transito_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudAdopcion::class, 'animal_id');
    }
}