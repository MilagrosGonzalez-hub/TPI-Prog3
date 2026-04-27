<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $fillable = [
        'rescatista_id',
        'texto',
        'imagen_url',
    ];

    public function rescatista()
    {
        return $this->belongsTo(Persona::class, 'rescatista_id');
    }
}
