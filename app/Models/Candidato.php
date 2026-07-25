<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Evaluacion;



class Candidato extends Model
{
    use HasFactory;

    public function evaluaciones(): HasMany
{
    return $this->hasMany(Evaluacion::class);
}

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'telefono',
        'puesto_solicitado',
        'ciudad',
        'usuario',
        'password',
        'estado',
        'credenciales_activas',
        'ultimo_acceso',
        'fecha_finalizacion',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'credenciales_activas' => 'boolean',
            'ultimo_acceso' => 'datetime',
            'fecha_finalizacion' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNombreCompletoAttribute(): string
    {
        return trim(
            $this->nombre . ' ' .
            $this->apellido_paterno . ' ' .
            ($this->apellido_materno ?? '')
        );
    }
}
