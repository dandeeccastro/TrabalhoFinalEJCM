<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use App\User;
use Illuminate\Support\Facades\Validator;
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

      return response()->json([$newUser]);
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
