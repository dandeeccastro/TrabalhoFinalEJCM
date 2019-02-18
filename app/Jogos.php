<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jogos extends Model
{
  use SoftDeletes;

  protected $dates = ['deteled_at'];

  protected $fillable = [];

  public function clientes()
    {
      return $this->belongsToMany('App\Cliente')->withTimestamps();
    }
  public function vendedor()
  {
    return $this->belongsTo('App\Vendedor');
  }
  public function categoria()
  {
    return $this->belongsTo('App\Categoria');
  }

  public function insereJogo($request){
    $this ->nome = $request ->nome;
    $this ->preco = $request ->preco;
    $this ->classificacaoUsuarios = $request ->classificacaoUsuarios;
    $this ->descricao = $request ->descricao;
    $this ->foto = $request ->foto;
    $this ->vendedor_id = $request ->vendedor_id;
    $this ->categoria_id = $request ->categoria_id;

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
    if($request->descricao) {
      $this->descricao = $request->descricao;
    }
    if($request->foto) {
      $this->foto = $request->foto;
    }

    $this->save();
  }
  public function deleteJogos($id){
    Jogos::destroy($id);
  }

}
