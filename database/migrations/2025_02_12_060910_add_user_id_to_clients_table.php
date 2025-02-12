<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            //$table->unsignedBigInteger('user_id')->after('id'); // Добавляем поле user_id
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Внешний ключ
        });
    }


    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
          //  $table->dropForeign(['user_id']); // Удаляем внешний ключ
           // $table->dropColumn('user_id'); // Удаляем поле user_id
        });
    }
};

