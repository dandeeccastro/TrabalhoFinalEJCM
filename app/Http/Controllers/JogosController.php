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
        
        $jogos->nome = $request->nome;
        $jogos->preco = $request->preco;
        $jogos->classificaoUsuarios = $request->nome;
        $jogos->descricao = $request->descricao;
        $jogos->foto = $request->foto;
        $jogos->video = $request->video;
        $jogos->vendedor_id = $request->vendedor_id;
        $jogos->save();
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
        //alteras os dados quando aplicável
        if($jogos->classificacaoUsuarios) {
            $classificacaoUsuarios->classificacaoUsuarios = $request->classificacaoUsuarios;
        }
        if($request->vendedor_id) {
            $vendedor_id->vendedor_id = $request->vendedor_id;
        }
        if($request->nome) {
            $nome->nome = $request->nome;
        }
         if($request->descricao) {
            $descricao->descricao = $request->descricao;
        }
         if($request->foto) {
            $foto->foto = $request->foto;
        }
         if($request->video) {
            $video->video = $request->video;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jogos::destroy($id);
        return response()->json(['message' => 'Instância deletada com sucesso']);
    }
}
