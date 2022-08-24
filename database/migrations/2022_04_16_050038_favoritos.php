<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Favoritos extends Migration
{

    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table ){
            $table->foreignId('pelicula_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
}

    public function down()
    {
        Schema::dropIffExists('favoritos');
    }
}
