<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = 'respuestas';

    protected $fillable = [
        'evaluacion_id',
        'pregunta_id',
        'respuesta_seleccionada',
        'respuesta_texto',
        'es_correcta',
        'puntaje_obtenido',
        'observaciones_rh',
        'revisada',
        'tiempo_respuesta_segundos',
    ];

    protected function casts(): array
    {
        return [
            'es_correcta' => 'boolean',
            'puntaje_obtenido' => 'decimal:2',
            'revisada' => 'boolean',
            'tiempo_respuesta_segundos' => 'integer',
        ];
    }

    public function evaluacion(): BelongsTo
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(Pregunta::class);
    }
}
