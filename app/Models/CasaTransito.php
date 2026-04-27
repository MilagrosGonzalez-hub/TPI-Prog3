<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasaTransito extends Model
{
    protected $table = 'casas_transito';
    protected $fillable = [
        'nombre',
        'direccion',
        'contacto',
        'capacidad',
        'rescatista_id',
    ];

    public function rescatista()
    {
        return $this->belongsTo(Persona::class, 'rescatista_id');
    }

    public function animales()
    {
        return $this->hasMany(Animal::class, 'casa_transito_id');
    }
}