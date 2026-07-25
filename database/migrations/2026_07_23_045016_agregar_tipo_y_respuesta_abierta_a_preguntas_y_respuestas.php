<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->enum('tipo_pregunta', [
                'opcion_multiple',
                'escala',
                'abierta',
            ])->default('opcion_multiple')->after('categoria');

            $table->text('criterio_evaluacion')
                ->nullable()
                ->after('respuesta_correcta');

            $table->boolean('calificacion_automatica')
                ->default(true)
                ->after('criterio_evaluacion');

            $table->unsignedInteger('puntaje_maximo')
                ->default(1)
                ->after('valor');

            $table->text('opcion_e')
                ->nullable()
                ->after('opcion_d');
        });

        Schema::table('respuestas', function (Blueprint $table) {
            $table->text('respuesta_texto')
                ->nullable()
                ->after('respuesta_seleccionada');

            $table->decimal('puntaje_obtenido', 6, 2)
                ->nullable()
                ->after('es_correcta');

            $table->text('observaciones_rh')
                ->nullable()
                ->after('puntaje_obtenido');

            $table->boolean('revisada')
                ->default(false)
                ->after('observaciones_rh');
        });
    }

    public function down(): void
    {
        Schema::table('respuestas', function (Blueprint $table) {
            $table->dropColumn([
                'respuesta_texto',
                'puntaje_obtenido',
                'observaciones_rh',
                'revisada',
            ]);
        });

        Schema::table('preguntas', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_pregunta',
                'criterio_evaluacion',
                'calificacion_automatica',
                'puntaje_maximo',
                'opcion_e',
            ]);
        });
    }
};
