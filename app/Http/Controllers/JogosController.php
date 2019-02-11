<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogos;
class JogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = Jogos::all();
        return response()->json([$jogos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $jogos = new Jogos;
      $jogos -> insereJogo($request);
      return response()->json([$jogos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogos = Jogos::find($id);
        return response()->json([$jogos]);
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
        $jogos = Jogos::find($id);
        $jogos -> updateJogos($request);

        return response()->json([$jogos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $jogos = new Jogos;
      $jogos -> deleteJogos($id);
      return response()->json(['message' => 'Instancia deletada com sucesso']);
    }
}
