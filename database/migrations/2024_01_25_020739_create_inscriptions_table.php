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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_session_fk')->unsigned();
            $table->bigInteger('id_rameur_fk')->unsigned();
            $table->boolean('valide');
            $table->timestamps();

            $table->foreign('id_session_fk')->references('id')->on('sessions');
            $table->foreign('id_rameur_fk')->references('id')->on('rameurs');

            $table->unique(['id_session_fk', 'id_rameur_fk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
