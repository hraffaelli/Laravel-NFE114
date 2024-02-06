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
        Schema::create('rameurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user_fk');
            $table->string('nom');
            $table->string('pre');
            $table->string('age');
            $table->string('email');
            $table->string('tel');
            $table->string('niv');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rameurs');
    }
};
