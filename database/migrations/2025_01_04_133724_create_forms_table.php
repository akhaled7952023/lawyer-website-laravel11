<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->text('message')->nullable();
            $table->string('device_fingerprint', 255)->default('empty value');
            $table->string('ip')->default('empty value');
            $table->string('canvas_fingerprint', 255)->default('empty value');
            $table->string('webgl_fingerprint', 255)->default('empty value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
