<?php

namespace App\Http\Requests;
//use App\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json($validator->error(),422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      if ($this->isMethod('post')){
        return [
          'name' => 'required|string|alpha',
          'email' => 'required|email|unique:users',
          'password' => 'required',
          'c_password' => 'required|same:password',
          //regras para método post
        ];
      }
      if ($this->isMethod('put')){
        return [
          'name' => 'string',
          'email' => 'required|email',
          'password' => 'required',
          'c_password' => 'required|same:password',


          //regras para método put
        ];
      }

    }

    public function messages() {
      return [
        //'name.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
        'email.email' => 'Digite um email valido.',
        //'email.unique' => 'Este email já foi cadastrado',
        //'c_password.same' => "As senha não sao iguais",
        //mensagens personalizadas aqui
      ];
    }
}
