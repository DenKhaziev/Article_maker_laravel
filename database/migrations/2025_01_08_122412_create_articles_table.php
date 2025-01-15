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
            $table->string('article_name');
            $table->string('article_description');
            $table->string('category_name')->nullable(); // думаю название сюда дублировать будет лишним
            $table->integer('category_id')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('status')->default(false);
            $table->string('image')->nullable();// тут я бы поставил дефолтное изображение чтобы битая картинка не отображалась
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
