<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen');
            $table->string('personal')->nullable();
            $table->string('horario')->nullable();
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->text('redes')->nullable();
            $table->text('promociones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allies');
    }
}
