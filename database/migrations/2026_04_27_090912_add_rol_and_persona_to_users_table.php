<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('rol', ['rescatista', 'adoptante'])->default('adoptante')->after('email');
            $table->foreignId('persona_id')->nullable()->constrained('personas')->onDelete('set null')->after('rol');
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');
        });
    }
};