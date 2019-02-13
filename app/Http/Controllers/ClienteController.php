<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
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
    public function store(ClienteRequest $request)
    {

      $clientes = new Cliente;
      $clientes -> insereCliente($request);
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
    public function update(ClienteRequest $request, $id)
    {
      //encontra o id desejado
      $clientes = Cliente::find($id);
      $clientes -> updateCliente($request);

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
      $clientes = new Cliente;
      $clientes -> deleteClientes($id);
      return response()->json(['message' => 'Instancia deletada com sucesso']);
    }
}
