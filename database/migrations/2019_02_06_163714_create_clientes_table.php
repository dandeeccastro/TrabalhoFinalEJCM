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
            $table->string('numeroCartao')->unique();
            $table->string('nomeTitularCartao');
            $table->integer('codigoSegurancaCartao')->unique();
            $table->string('bandeiraCartao');
            $table->string('dataDeVencimentoCartao');
            $table->integer('users_id')->unsigned()->nullable();
            $table->SoftDeletes();

            $table->timestamps();
        });
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

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
