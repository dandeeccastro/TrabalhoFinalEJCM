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
            $table->integer('categoria_id')->unsigned();
            $table->integer('classificacaoUsuarios')->default('5');
            $table->longText('descricao');
            $table->string('foto')->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
        Schema::table('jogos', function (Blueprint $table) {
          $table->foreign('vendedor_id')->references('id')->on('vendedors')->onDelete('cascade');
          $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
