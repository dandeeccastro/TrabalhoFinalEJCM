<?php

namespace App\Http\Controllers;
use App\Jogos;
use Illuminate\Http\Request;
use App\Vendedor;
use App\User;
use Illuminate\Support\Facades\Validator;
class VendedorController extends Controller
{
  public $successStatus =200;
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
      $validator = Validator::make($request -> all(),[
        	'name' => 'required|alpha',
  		'email' => 'required|email|unique:users',
  		'password' => 'required',
  		'c_password' => 'required|same:password',
        	'cpf' => 'formato_cpf|required',
        	'telefone' => 'celular',
        	'dataDeNascimento'=>'data|required',
        	'username'=>'required'



      ]);
  		if ($validator -> fails()){
  			return response()-> json(['error' => $validator-> errors()], 400);
  		}

  		$newUser = new User;
  		$newUser->name = $request ->name;
  		$newUser->email = $request->email;
  		$newUser-> password = bcrypt($request -> password);
      	$newUser->cpf = $request->cpf;
      	$newUser->username= $request->username;
      	$newUser->dataDeNascimento = $request->dataDeNascimento;
      	$newUser->telefone = $request->telefone;
  		$success['token'] = $newUser-> createToken('MyApp')->accessToken;
  		$success['username'] = $newUser-> username;
      $success['token'] = $newUser-> createToken('MyApp')->accessToken;
  		$success['username'] = $newUser-> username;

      $newUser-> save();


      $vendedor = new Vendedor;
      $vendedor ->user_id = $newUser->id;
      $vendedor -> insereVendedores($request);
  		return response()-> json(['success'=>$success], $this -> successStatus);
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

    public function getJogos($id)
  {
      $vendedor = Vendedor::findOrFail($id);
      return response()->json([$vendedor->jogos]);
  }

}
