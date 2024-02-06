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
        Schema::create('compositions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_equipe_fk')->unsigned();
            $table->bigInteger('id_rameur_fk')->unsigned();
            $table->timestamps();

            $table->foreign('id_equipe_fk')->references('id')->on('equipes');
            $table->foreign('id_rameur_fk')->references('id')->on('rameurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compositions');
    }
};
