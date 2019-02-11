<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jogos extends Model
{
  use SoftDeletes;

  protected $dates = ['deteled_at'];

  public function insereJogo($request){
    $this ->nome = $request ->nome;
    $this ->preco = $request ->preco;
    $this ->classificaoUsuarios = $request ->classificaoUsuarios;
    $this ->descricao = $request ->descricao;
    $this ->foto = $request ->foto;
    $this ->video = $request ->video;
    $this ->vendedor_id = $request ->vendedor_id;
    //$this ->users_id = $request ->users_id;

    $this -> save();
  }
  public function updateJogos($request){
    //alteras os dados quando aplicável
    if($request->nome) {
      $this->nome = $request->nome;
    }
    if($request->preco) {
      $this->preco = $request->preco;
    }
    if($request->classificaoUsuarios) {
      $this->classificaoUsuarios = $request->classificaoUsuarios;
    }
    if($request->descricao) {
      $this->descricao = $request->descricao;
    }
    if($request->foto) {
      $this->foto = $request->foto;
    }
    if($request->video) {
      $this->video = $request->video;
    }
    if($request->vendedor_id) {
      $this->vendedor_id = $request->vendedor_id;
    }
    $this->save();
  }
  public function deleteJogos($id){
    Jogos::destroy($id);
  }

}
