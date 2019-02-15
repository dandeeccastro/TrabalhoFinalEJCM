<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(´[
    		'numeroCartao' => '123456789',
    		'nomeTitularCartao' => 'Rodrigo',
    		'codigoSegurancaCartao' => '123',
    		'dataDeVencimentoCartao' => '12/12/2019',
    		'users_id' => '1'

    		]);
    }
}
