<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categorias')->insert([
    		'numeroCartao' => '56456123184',
    		'nomeTitularCartao' => 'Diego',
    		'codigoSegurancaCartao' => '125',
    		'dataDeVencimentoCartao' => '15/12/2019',
    		'users_id' => '6'

    		]);
        //
    }
}
