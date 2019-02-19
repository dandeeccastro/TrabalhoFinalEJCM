<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
class PassportController extends Controller
{
  public $successStatus =200;
  public function login(){
    if (Auth::attempt(['username' => request('username'), 'password' =>request('password')])){
      $user = Auth::user();
      $success['token'] = $user -> createToken('MyApp') -> accessToken;
      return response() -> json(['success' => $success], $this ->successStatus);
    }
    else {
      return response() -> json (['error' => 'Unauthorised'], 401);
    }
  }

  // public function register(Request $request){
  //   $validator = Validator::make($request -> all(),[
  //     	'name' => 'required|alpha',
	// 	'email' => 'required|email|unique:users',
	// 	'password' => 'required',
	// 	'c_password' => 'required|same:password',
  //     	'cpf' => 'formato_cpf|required',
  //     	'telefone' => 'celular',
  //     	'dataDeNascimento'=>'data|required',
  //     	'username'=>'required'
  //
  //
  //
  //   ]);
	// 	if ($validator -> fails()){
	// 		return response()-> json(['error' => $validator-> errors()], 400);
	// 	}
  //
	// 	$newUser = new User;
	// 	$newUser->name = $request ->name;
	// 	$newUser->email = $request->email;
	// 	$newUser-> password = bcrypt($request -> password);
  //   	$newUser->cpf = $request->cpf;
  //   	$newUser->username= $request->username;
  //   	$newUser->dataDeNascimento = $request->dataDeNascimento;
  //   	$newUser->telefone = $request->telefone;
	// 	$success['token'] = $newUser-> createToken('MyApp')->accessToken;
	// 	$success['username'] = $newUser-> username;
	// 	$newUser-> save();
	// 	return response()-> json(['success'=>$success], $this -> successStatus);
	// }
	public function getDetails(){
		$user= Auth::user();
		return response() -> json(['success' => $user], $this->successStatus);
	}
	public function logout(){
		$accessToken = Auth::user()->token();
		DB::table('oauth_refresh_tokens')-> where('access_token_id', $accessToken-> id)-> update(['revoked'=>true]);
		$accessToken->revoke();
		return response()->json(null, 204);
  }

  //public function selfUpdateVendedor(UserRequest $request){
  //  $user = Auth::user();
  //  $user->update($request);
  //  return response()->json([$user]);
//  }

//  public function selfUpdateCliente(UserRequest $request){
  //  $user = Auth::user();
  //  $user->update($request);
  //  return response()->json([$user]);

}
