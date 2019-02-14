<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
class PassportController extends Controller
{
  public $successStatus =200;
  public function login(){
    if (Auth::attempt(['email' => request('email'), 'password' =>request('password')])){
      $user = Auth::user();
      $success['token'] = $user -> createToken('MyApp') -> accessToken;
      return response() -> json(['success' => $success], $this ->successStatus);
    }
    else {
      return response() -> json (['error' => 'Unauthorised'], 401);
    }
  }
  public function register(Request $request){
    $validator = Validator::make($request -> all(),[
      'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'c_password' => 'required|same:password',
    ]);
		if ($validator -> fails()){
			return response()-> json(['error' => $validator-> errors()], 400);
		}
		$newUser = new User;
		$newUser->name = $request ->name;
		$newUser->email = $request->email;
		$newUser-> password = bcrypt($request -> password);
    $newUser->cpf = $request->cpf;
    $newUser->endereco= $request->endereco;
    $newUser->dataDeNascimento = $request->dataDeNascimento;
    $newUser->telefone = $request->telefone;
		$success['token'] = $newUser-> createToken('MyApp')->accessToken;
		$success['name'] = $newUser-> name;;
		$newUser-> save();
		return response()-> json(['success'=>$success], $this -> successStatus);
	}
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

}
