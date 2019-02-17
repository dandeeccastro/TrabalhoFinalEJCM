<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use App\User;
use App\Jogos;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ClienteResource;
use App\Notifications\RegisterNotification;

class ClienteController extends Controller
{
  public $successStatus =200;
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
      $newUser->notify(new RegisterNotification($newUser));
      $newUser-> save();

      $clientes = new Cliente;
      $clientes ->users_id = $newUser->id;
      $clientes -> insereCliente($request);
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
      $clientes = Cliente::find($id);
      //$clientes -> updateCliente($request);
      $newUser= User::find($clientes->users_id);
      if($request->username) {
        $newUser->username = $request->username;
      }
      if($request->email) {
        $newUser->email = $request->email;
      }
      if($request->telefone) {
        $newUser->telefone = $request->telefone;
      }
      //encontra o id desejado
      $newUser-> save();

      return new ClienteResource($newUser);
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
    public function compra(Request $request)
    {
      $clientes = Cliente::findOrFail($request->cliente_id);
      $clientes->jogos()->attach($request->jogo_id);
      $clientes-> save();
      return response()->json(['message' => 'Operação realizada com sucesso.']);
    }
}
