<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('solicitudes_adopcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animales')->onDelete('cascade');
            $table->foreignId('adoptante_id')->constrained('personas')->onDelete('cascade');
            $table->enum('estado', ['pendiente', 'aceptada', 'rechazada'])->default('pendiente');
            $table->text('mensaje')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('solicitudes_adopcion');
    }
};
