<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('candidato_id')
                ->constrained('candidatos')
                ->cascadeOnDelete();

            $table->string('tipo')->default('general');

            $table->enum('estado', [
                'pendiente',
                'en_proceso',
                'finalizada',
                'cancelada',
            ])->default('pendiente');

            $table->unsignedInteger('total_preguntas')->default(0);
            $table->unsignedInteger('respuestas_correctas')->default(0);
            $table->unsignedInteger('respuestas_incorrectas')->default(0);
            $table->unsignedInteger('respuestas_sin_contestar')->default(0);

            $table->decimal('calificacion', 5, 2)->nullable();

            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_finalizacion')->nullable();

            $table->unsignedInteger('duracion_segundos')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
