<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();

            $table->string('categoria', 100);
            $table->text('pregunta');

            $table->string('opcion_a');
            $table->string('opcion_b');
            $table->string('opcion_c')->nullable();
            $table->string('opcion_d')->nullable();

            $table->enum('respuesta_correcta', [
                'a',
                'b',
                'c',
                'd',
            ]);

            $table->unsignedInteger('valor')->default(1);
            $table->unsignedInteger('orden')->default(0);

            $table->boolean('activa')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};

