<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('evaluacion_id')
                ->constrained('evaluaciones')
                ->cascadeOnDelete();

            $table->foreignId('pregunta_id')
                ->constrained('preguntas')
                ->cascadeOnDelete();

            $table->enum('respuesta_seleccionada', [
                'a',
                'b',
                'c',
                'd',
            ])->nullable();

            $table->boolean('es_correcta')->nullable();

            $table->unsignedInteger('tiempo_respuesta_segundos')
                ->nullable();

            $table->timestamps();

            $table->unique([
                'evaluacion_id',
                'pregunta_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
