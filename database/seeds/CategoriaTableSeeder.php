<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categorias')->insert([
    		'nome' => 'Aventura',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Survival',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Arcade',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'RPG',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Corrida',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Esportes',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Estrategia',
    		]);
    	DB::table('categorias')->insert([
    		'nome' => 'Ação',
    		]);


       
    }
}
