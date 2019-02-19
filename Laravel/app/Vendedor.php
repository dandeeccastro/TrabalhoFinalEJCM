<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Jogos;

class Vendedor extends Model
{
  use SoftDeletes;

  protected $dates = ['deteled_at'];

  public function user()
    {
      return $this->hasOne('App\User');
    }

  public function jogos()
  {
    return $this->hasMany('App\Jogos');
  }
  public function insereVendedores($request){
    //$this ->user_id = $request->user_id;
    $this->ContaCorrente = $request->ContaCorrente;
    $this->agencia = $request->agencia;
    $this->banco = $request->banco;
    $this->operacao = $request->operacao;

    $this-> save();
  }
  public function updateVendedores($request){
    //alteras os dados quando aplicável

    if($request->ContaCorrente) {
      $this->ContaCorrente = $request->ContaCorrente;
    }
    if($request->agencia) {
      $this->agencia = $request->agencia;
    }
    if($request->banco) {
      $this->banco = $request->banco;
    }
    if($request->operacao) {
      $this->operacao = $request->operacao;
    }

    $this->save();
  }
  public function deleteVendedores($id){
    Vendedor::destroy($id);

  }

}
