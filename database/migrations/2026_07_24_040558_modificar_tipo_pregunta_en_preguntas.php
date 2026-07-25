<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE preguntas
            MODIFY tipo_pregunta VARCHAR(50)
            NOT NULL DEFAULT 'opcion_multiple'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE preguntas
            MODIFY tipo_pregunta ENUM(
                'opcion_multiple'
            )
            NOT NULL DEFAULT 'opcion_multiple'
        ");
    }
};
