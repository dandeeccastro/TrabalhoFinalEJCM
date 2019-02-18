<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JogosRequest;
use App\Jogos;
use App\Vendedor;
use App\Categoria;
use App\Http\Resources\JogoResource;

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
        return response()->json($jogos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JogosRequest $request)
    {
      $jogos = new Jogos;
      $jogos -> insereJogo($request);
      return new JogoResource($jogos);
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
        return new JogoResource($jogos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JogosRequest $request, $id)
    {
    //encontra o id desejado
        $jogos = Jogos::find($id);
        $jogos -> updateJogos($request);

        return new JogoResource($jogos);
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
    //funcao que printa os jogos de uma categoria
    public function getCategoria($id)
  {
      $categoria = Categoria::findOrFail($id);
      return response()->json([$categoria->jogos]);
  }
  // public function classificacao()
  // {
  //   $media = App\Jogos::avg('classificacaoUsuarios');
  //   return response()->json([$media]);
  //
  // }
  public function pesquisar(Request $request)
  {
    $lista = Jogos::where('nome', 'like', '%' .$request->nome. '%')
                  ->orderBy('nome', 'ASC')->first();
                  dd($lista);
                  //->get();
    return response()->json([$lista]);

  }
}
