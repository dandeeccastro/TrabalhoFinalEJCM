<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesJogos extends Migration
{
  public function up()
  {
    Schema::create('clientes_jogos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('cliente_id')->unsigned();
      $table->integer('jogos_id')->unsigned();
      $table->timestamps();
    });

    Schema::table('clientes_jogos',function(Blueprint $table)  {
      $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
    });
    Schema::table('clientes_jogos',function(Blueprint $table)  {
      $table->foreign('jogos_id')->references('id')->on('jogos')->onDelete('cascade');
    });
  }

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('clientes_jogos');
}
}
