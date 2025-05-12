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
        Schema::create('likes', function (Blueprint $table) {
            $table->foreignId('noticia_id')->constrained('noticias', 'id');
            $table->foreignId('usuario_id')->constrained('usuarios');
           
             // $table->unsignedSmallInteger('usuario_id');
             // $table->foreign('usuario_id')->references('id')->on('usuarios');

            // Definimos la PK combinada a partir de las dos FKs.
            $table->primary(['noticia_id', 'usuario_id']);

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
        Schema::dropIfExists('likes');
    }
};
