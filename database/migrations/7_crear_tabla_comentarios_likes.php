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
        Schema::create('likes_comentario', function (Blueprint $table) {
            $table->foreignId('comentario_id')->constrained('comentarios', 'id');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->primary(['comentario_id', 'usuario_id']);

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
        Schema::dropIfExists('likes_comentario');
    }
};
