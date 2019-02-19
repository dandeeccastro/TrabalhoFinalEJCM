<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public function jogos()
    {
      return $this->hasMany('App\Jogos');
    }
  public function insereCategoria($request){
    $this ->nome = $request->nome;

    $this -> save();
    }
  public function updateCategoria($request){
    //alteras os dados quando aplicável
    if($request->nome) {
      $this->nome = $request->nome;
    }
      $this->save();
    }
  public function deleteCategoria($id){
      Categoria::destroy($id);

    }

}
