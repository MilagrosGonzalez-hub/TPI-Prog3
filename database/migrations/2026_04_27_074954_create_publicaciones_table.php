<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rescatista_id')->constrained('personas')->onDelete('cascade');
            $table->text('texto');
            $table->string('imagen_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('publicaciones');
    }
};