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
    	DB::table('users')->insert([
    		'name' => 'Jose',
    		'email' => 'a@gmail.com',
    		'password' => '125531',
    		'cpf' => '123.456.987-78',
    		'username' => 'Jose12',
        'dataDeNascimento' => '15/12/2019',
        'telefone' => '95623-3256',

    		]);
        DB::table('users')->insert([
          'name' => 'Jose',
          'email' => 'a@gmail.com',
          'password' => '125531',
          'cpf' => '123.456.987-78',
          'username' => 'Jose12',
          'dataDeNascimento' => '15/12/2019',
          'telefone' => '95623-3256',

          ]);
          DB::table('users')->insert([
            'name' => 'Antonio',
            'email' => 'ab@gmail.com',
            'password' => '125531',
            'cpf' => '123.456.987-73',
            'username' => 'Ant12',
            'dataDeNascimento' => '12/12/2019',
            'telefone' => '95623-3245',

            ]);
            DB::table('users')->insert([
              'name' => 'Leao',
              'email' => 'abc@gmail.com',
              'password' => '1255314',
              'cpf' => '124.456.987-73',
              'username' => 'Ant1234',
              'dataDeNascimento' => '12/02/2019',
              'telefone' => '95233-3245',

              ]);
              DB::table('users')->insert([
                'name' => 'Miguel',
                'email' => 'abcd@gmail.com',
                'password' => '125531',
                'cpf' => '123.446.987-73',
                'username' => 'Ant12',
                'dataDeNascimento' => '17/12/2019',
                'telefone' => '95923-3245',

                ]);

            //
          //
        //
    }
}
