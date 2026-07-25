<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        /*
         * Permite guardar:
         * - a, b, c, d
         * - respuestas numéricas
         * - valores del 1 al 5
         * - respuestas cortas
         */
        DB::statement("
            ALTER TABLE preguntas
            MODIFY respuesta_correcta VARCHAR(255) NULL
        ");

        DB::statement("
            ALTER TABLE respuestas
            MODIFY respuesta_seleccionada VARCHAR(255) NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE respuestas
            MODIFY respuesta_seleccionada ENUM('a','b','c','d') NULL
        ");

        DB::statement("
            ALTER TABLE preguntas
            MODIFY respuesta_correcta ENUM('a','b','c','d') NULL
        ");
    }
};
