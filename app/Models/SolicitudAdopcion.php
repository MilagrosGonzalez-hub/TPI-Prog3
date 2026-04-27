<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudAdopcion extends Model
{
    protected $table = 'solicitudes_adopcion';
    protected $fillable = [
        'animal_id',
        'adoptante_id',
        'estado',
        'mensaje',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function adoptante()
    {
        return $this->belongsTo(Persona::class, 'adoptante_id');
    }
}