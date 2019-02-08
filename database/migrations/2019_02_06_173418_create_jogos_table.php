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
            $table->integer('vendedorId')->unsigned();
            $table->integer('categoriaId')->unsigned();
            $table->string('classificacaoUsuarios');
            $table->string('descricao');
            $table->timestamps();
        });
        Schema::table('jogos', function (Blueprint $table) {
          $table->foreign('vendedorId')->references('id')->on('vendedor')->onDelete('cascade');
          $table->foreign('categoriaId')->references('id')->on('categoria')->onDelete('cascade');

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
