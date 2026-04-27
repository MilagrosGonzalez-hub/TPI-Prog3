<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('especie', ['perro', 'gato', 'otro']);
            $table->integer('edad')->nullable();
            $table->enum('tamano', ['chico', 'mediano', 'grande'])->nullable();
            $table->enum('estado', ['disponible', 'en_transito', 'adoptado'])->default('disponible');
            $table->string('zona')->nullable();
            $table->text('descripcion')->nullable();
            $table->foreignId('rescatista_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('casa_transito_id')->nullable()->constrained('casas_transito')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('animales');
    }
};