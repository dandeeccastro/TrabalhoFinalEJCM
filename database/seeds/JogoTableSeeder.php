<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JogoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jogos')->insert([
        'nome' => 'Mario Bros',
        'preco' => '12,50',
        'descricao' => '125531',
        'foto' => '123.456.987-78',
        'vendedor_id' => '2',
        'categoria_id' => '1',
        'classificacaoUsuarios' => '5',

        ]);
        DB::table('jogos')->insert([
          'nome' => 'Call of duty',
          'preco' => '12,50',
          'descricao' => '125531',
          'foto' => '123.456.987-78',
          'vendedor_id' => '2',
          'categoria_id' => '3',
          'classificacaoUsuarios' => '5',

          ]);
          DB::table('jogos')->insert([
            'nome' => 'God of war',
            'preco' => '12,50',
            'descricao' => '125531',
            'foto' => '123.456.987-78',
            'vendedor_id' => '1',
            'categoria_id' => '5',
            'classificacaoUsuarios' => '5',

            ]);
            DB::table('jogos')->insert([
              'nome' => 'LOL',
              'preco' => '12,50',
              'descricao' => '125531',
              'foto' => '123.456.987-78',
              'vendedor_id' => '1',
              'categoria_id' => '7',
              'classificacaoUsuarios' => '5',

              ]);
        //
    }
}
