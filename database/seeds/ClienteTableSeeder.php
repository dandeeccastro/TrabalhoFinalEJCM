<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
    		'numeroCartao' => '123456789',
    		'nomeTitularCartao' => 'Rodrigo',
    		'codigoSegurancaCartao' => '123',
    		'dataDeVencimentoCartao' => '01/12/2019',
    		'users_id' => '1'

    		]);
        DB::table('categorias')->insert([
    		'numeroCartao' => '4665456454',
    		'nomeTitularCartao' => 'Rafael',
    		'codigoSegurancaCartao' => '111',
    		'dataDeVencimentoCartao' => '08/12/2019',
    		'users_id' => '2'

    		]);
        DB::table('categorias')->insert([
    		'numeroCartao' => '5645645465465',
    		'nomeTitularCartao' => 'Rogerio',
    		'codigoSegurancaCartao' => '123',
    		'dataDeVencimentoCartao' => '09/12/2019',
    		'users_id' => '3'

    		]);

    }
}
