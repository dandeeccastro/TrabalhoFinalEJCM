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
