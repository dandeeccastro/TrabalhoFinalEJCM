<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('preco');
            $table->integer('vendedor_id')->unsigned();
            //$table->integer('categoria_id')->unsigned();
            $table->string('classificacaoUsuarios')->nullable();
            $table->string('descricao');
            $table->string('foto');
            $table->string('video');
            $table->timestamps();
        });
        Schema::table('jogos', function (Blueprint $table) {
          $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
          //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
          //$table->foreign('foto_id')->references('id')->on('foto')->onDelete('cascade');
          //$table->foreign('video_id')->references('id')->on('video')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogos');
    }
}
