<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('content');
            $table->foreignId('category_id')->constrained('article_categories')->onDelete('cascade');
            $table->string('images');
            $table->boolean('status')->default(1);
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->text('meta_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
