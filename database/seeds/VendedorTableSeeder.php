<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendedors')->insert([
      'classificacao' => '4',
      'users_id' => '4'
    ]);
    DB::table('vendedors')->insert([
    'numeroCartao' => '4',
    'users_id' => '5'
  ]);


        //
    }
}
