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
        Schema::create('comptage_biens', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bien');
            $table->unsignedBigInteger('id_comptage');
            $table->enum('etas', ['inventorie', 'non inventorie', 'non trouve'])->default('non inventorie');
            $table->unsignedBigInteger("id_user_createure");
            $table->unsignedBigInteger("id_user_updateure")->nullable();
            $table->timestamps();
            $table->foreign('id_user_createure')->references('id_user')->on('users');
            $table->foreign('id_user_updateure')->references('id_user')->on('users');
            $table->foreign('id_bien')->references('id_bien')->on('biens');
            $table->foreign('id_comptage')->references('id_comptage')->on('comptage');
            $table->primary(['id_comptage', 'id_bien']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptage_biens');
    }
};
