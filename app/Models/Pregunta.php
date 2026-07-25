<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = [
        'examen',
        'seccion',
        'categoria',
        'tipo_pregunta',
        'pregunta',
        'opcion_a',
        'opcion_b',
        'opcion_c',
        'opcion_d',
        'opcion_e',
        'respuesta_correcta',
        'criterio_evaluacion',
        'calificacion_automatica',
        'valor',
        'puntaje_maximo',
        'orden',
        'activa',
    ];

    protected function casts(): array
    {
        return [
            'activa' => 'boolean',
            'calificacion_automatica' => 'boolean',
            'valor' => 'integer',
            'puntaje_maximo' => 'integer',
            'orden' => 'integer',
        ];
    }

    public function respuestas(): HasMany
    {
        return $this->hasMany(Respuesta::class);
    }
}

