<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('aula_id');
            $table->string("nombre", 32);
            $table->string("telf", 12)->nullable();
            $table->unsignedInteger("edad")->nullable();
            $table->string("contrasena", 64);
            $table->string("correo", 64)->unique()->nullable();
            $table->string("sexo", 16)->nullable();
            $table->foreign('aula_id')->references('id')->on('aulas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
