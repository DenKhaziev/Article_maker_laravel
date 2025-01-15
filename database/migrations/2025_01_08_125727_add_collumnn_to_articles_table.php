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
        //Если соблюдать конвенцию наименований, то ключ на юзера можно так добавить
        //$table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        //тоже самое с категориями
        /*$table->foreignIdFor(\App\Models\Category::class)
            ->constrained()->cascadeOnUpdate()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();*/
        Schema::table('articles', function (Blueprint $table) {
            $table->string('userId')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
