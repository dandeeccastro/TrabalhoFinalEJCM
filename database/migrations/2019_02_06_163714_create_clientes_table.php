<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('endereco');
            $table->string('dataDeNascimento');
            $table->string('numeroCartao')->unique();
            $table->string('nomeTitularCartao');
            $table->string('codigoSegurancaCartao')->unique();
            $table->string('bandeiraCartao');
            $table->string('dataDeVencimentoCartao');
            $table->string('user_id')->unsigned();

            $table->timestamps();
        });
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
