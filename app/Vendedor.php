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
    $this ->classificacao = $request->classificacao;

    $this -> save();
  }
  public function updateVendedores($request){
    //alteras os dados quando aplicável
    if($request->classificacao) {
      $this->classificacao = $request->classificacao;
    }

    $this->save();
  }
  public function deleteVendedores($id){
    Vendedor::destroy($id);

  }

}
