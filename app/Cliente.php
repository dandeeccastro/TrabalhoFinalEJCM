<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use SoftDeletes;

    protected $dates = ['deteled_at'];


    protected $fillable = [];

    public function insereCliente($request){
      $this ->numeroCartao = $request ->numeroCartao;
      $this ->nomeTitularCartao = $request ->nomeTitularCartao;
      $this ->codigoSegurancaCartao = $request ->codigoSegurancaCartao;
      $this ->bandeiraCartao = $request ->bandeiraCartao;
      $this ->dataDeVencimentoCartao = $request ->dataDeVencimentoCartao;
      //$this ->users_id = $request ->users_id;

      $this -> save();
    }
    public function updateCliente($request){
      //alteras os dados quando aplicável
      if($request->numeroCartao) {
        $this->numeroCartao = $request->numeroCartao;
      }
      if($request->nomeTitularCartao) {
        $this->nomeTitularCartao = $request->nomeTitularCartao;
      }
      if($request->codigoSegurancaCartao) {
        $this->codigoSegurancaCartao = $request->codigoSegurancaCartao;
      }
      if($request->bandeiraCartao) {
        $this->bandeiraCartao = $request->bandeiraCartao;
      }
      if($request->dataDeVencimentoCartao) {
        $this->dataDeVencimentoCartao = $request->dataDeVencimentoCartao;
      }
      //if($request->users_id) {
        //$clientes->users_id = $request->users_id;
      //}
      //salva
      $this->save();
    }
    public function getAll($request){
      $clientes = Cliente::all();
    }
    public function deleteClientes($id){
      Cliente::destroy($id);

    }

}
