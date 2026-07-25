<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();

            $table->string('correo')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('puesto_solicitado');

            $table->string('usuario')->unique();
            $table->string('password');

            $table->enum('estado', [
                'pendiente',
                'en_proceso',
                'finalizado',
                'bloqueado'
            ])->default('pendiente');

            $table->boolean('credenciales_activas')->default(true);
            $table->timestamp('ultimo_acceso')->nullable();
            $table->timestamp('fecha_finalizacion')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
