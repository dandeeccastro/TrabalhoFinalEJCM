<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vendedor = Vendedor::all();
      return response()->json([$vendedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $vendedor = new Vendedor;
      $vendedor -> insereVendedores($request);
      return response()->json([$vendedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $vendedor = Vendedor::find($id);
      return response()->json([$vendedor]);
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
      $vendedor = Vendedor::find($id);
      //alteras os dados quando aplicável
      $vendedor -> updateVendedores($request);
      return response()->json([$vendedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $vendedor = new Vendedor;
      $vendedor -> deleteVendedores($id);
      return response()->json(['message' => 'Instancia deletada com sucesso']);
    }
}
