<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $fillable = [
        'candidato_id',
        'tipo',
        'estado',
        'total_preguntas',
        'respuestas_correctas',
        'respuestas_incorrectas',
        'respuestas_sin_contestar',
        'calificacion',
        'fecha_inicio',
        'fecha_finalizacion',
        'duracion_segundos',
    ];

    protected function casts(): array
    {
        return [
            'calificacion' => 'decimal:2',
            'fecha_inicio' => 'datetime',
            'fecha_finalizacion' => 'datetime',
            'duracion_segundos' => 'integer',
        ];
    }

    public function candidato(): BelongsTo
    {
        return $this->belongsTo(Candidato::class);
    }

    public function respuestas(): HasMany
    {
        return $this->hasMany(Respuesta::class);
    }
}
