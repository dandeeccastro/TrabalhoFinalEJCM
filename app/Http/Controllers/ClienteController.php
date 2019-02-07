<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //pega todas as instâncias do objeto
      $clientes = Cliente::all();
      return response()->json([$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $clientes = new Cliente;

      $clientes->nome = $request->nome;
      $clientes->cpf = $request->cpf;
      $clientes->email = $request->email;
      $clientes->dataDeNascimento = $request->dataDeNascimento;
      $clientes->telefone = $request->telefone;
      $clientes->numeroCartao = $request->numeroCartao;
      $clientes->endereco = $request->endereco;
      //salva
      $clientes->save();
      return response()->json([$clientes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //encontra a instância desejada e atribui
      $clientes = Cliente::find($id);
      return response()->json([$clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //encontra o id desejado
      $clientes = Cliente::find($id);
      //alteras os dados quando aplicável
      if($request->nome) {
        $clientes->nome = $request->nome;
      }
      if($request->cpf) {
        $clientes->cpf = $request->cpf;
      }
      if($request->email) {
        $clientes->email = $request->email;
      }
      if($request->dataDeNascimento) {
        $clientes->dataDeNascimento = $request->dataDeNascimento;
      }
      if($request->telefone) {
        $clientes->telefone = $request->telefone;
      }
      if($request->numeroCartao) {
        $clientes->numeroCartao = $request->numeroCartao;
      }
      if($request->endereco) {
        $clientes->endereco = $request->endereco;
      }
      //salva
      $clientes->save();
      return response()->json([$clientes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cliente::destroy($id);
      return response()->json(['message' => 'Instância deletada com sucesso']);
    }
}
