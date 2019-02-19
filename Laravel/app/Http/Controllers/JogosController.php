<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JogosRequest;
use App\Jogos;
use Auth;
use App\User;
use App\Vendedor;
use Illuminate\Support\Facades\Storage;
use Validator;
use Carbon\Carbon;


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
    public function store(JogosRequest $request)
    {
      $jogos = new Jogos;
      $jogos -> insereJogo($request);


       //Pega o arquivo da request

        $file = $request->file('foto');

        //Cria um nome unico para a foto

        $filename = 'foto.'.$file->getClientOriginalExtension();

        //Cria a pasta de fotos caso não exista

        if (!Storage::exists('jogosFoto/'))
          Storage::makeDirectory('jogosFoto/',0775,true);

        //Valida a foto
        $validator = Validator::make($request->all(), [
            'foto' =>'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        //Caso a requisição venha fora do esperado retorna um erro Bad Request 400
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $path = $file->storeAs('Jogosfoto', $filename);

        $jogos->foto = $path;

        $jogos->save();

      return response()->json([$jogos]);
    }

    public function downloadFoto($id){
      $jogos = Jogos::findOrFail($id);
    //  $jogos -> downloadJ($request);
      return response()->download(storage_path('app/'.$jogos->foto));
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
    public function update(JogosRequest $request, $id)
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

    public function jogosVendedor(){

      $user = Auth::user();

      $vendedor = vendedor::where('user_id', $user->id)->first();
      $jogos = Jogos::where('vendedor_id', $vendedor->id)->get();
      return response()->json([$jogos]);
    }

    public function jogosDoAno(){
      $date = Carbon::now();
      $year = $date->year;
      $jogos = Jogos::where('anoDoLancamento', $year)->orderBy('mesDeLancamento', 'desc')->get();

      return response()->json([$jogos]);

    }

}
