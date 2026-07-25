<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE preguntas
            MODIFY opcion_a TEXT NULL,
            MODIFY opcion_b TEXT NULL,
            MODIFY opcion_c TEXT NULL,
            MODIFY opcion_d TEXT NULL,
            MODIFY opcion_e TEXT NULL,
            MODIFY respuesta_correcta TEXT NULL,
            MODIFY criterio_evaluacion TEXT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE preguntas
            MODIFY opcion_a TEXT NOT NULL,
            MODIFY opcion_b TEXT NOT NULL,
            MODIFY opcion_c TEXT NOT NULL,
            MODIFY opcion_d TEXT NOT NULL,
            MODIFY opcion_e TEXT NOT NULL,
            MODIFY respuesta_correcta TEXT NOT NULL,
            MODIFY criterio_evaluacion TEXT NOT NULL
        ");
    }
};

