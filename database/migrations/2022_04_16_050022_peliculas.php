<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peliculas extends Migration
{

    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('director');
            $table->text('descripcion');
            $table->string('duracion');
            $table->string('urltrailer');
            $table->string('imagen');
            $table->foreignId('categoria_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
