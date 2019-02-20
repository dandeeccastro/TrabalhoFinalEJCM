<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;//usando Passport
use App\Cliente;

class User extends Authenticatable
{

    use Notifiable;
    use HasApiTokens; //indicar que o import acima será utilizado
    public function vendedor()
      {
        return $this->hasOne('App\Vendedor');
      }
    public function clientes()
        {
          //return $this->hasOne('App\Cliente');
          return Cliente::where('users_id',$this->id)->first();
        }
        public function role(){
          $vendedor = $this->vendedor;
          $cliente = $this->clientes();
          if($cliente){
            return ['cliente' => $cliente];
          } else {
            return ['vendedor' => $vendedor];
          }
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //public cliente(){
        //return $this->haveOne('App\cliente');
    //}

    //$cliente = User::find($id)->cliente();



}
