<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\ServiceProvider;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('idEvento');
            $table->string('nombre');
            $table->string('nombreArtista');
            $table->integer('capacidadRestante');
            $table->integer('lugar_id');
            $table->date('fecha');
            $table->integer('hora');
            $table->integer('minutos');
            $table->float('preNormal')->nullable();
            $table->float('preVip')->nullable();
            $table->integer('visible');
            $table->string('foto');

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
        Schema::dropIfExists('eventos');
    }
}
