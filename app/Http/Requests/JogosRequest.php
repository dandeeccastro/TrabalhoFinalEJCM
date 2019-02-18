<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Jogos;
class JogosRequest extends FormRequest
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
      throw new HttpResponseException(response()->json($validator->errors(),422));
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
          'foto'=>'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
          'nome'=>'required',
          'descricao'=>'required',
          //'video'=>'url',
          'preco'=>'numeric|required',
          //regras para método post
        ];
      }
      if ($this->isMethod('put')){
        return [
          'foto'=>'required|file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
          //'video'=>'url',
          'preco'=>'numeric',
          //regras para método put
        ];
      }
    }
    public function messages() {
      return [
        'foto.required' => 'É obrigatorio o uso de uma foto para o seu jogo',
        //'foto.url'=> 'Coloque a URL da sua foto de forma adequada',
        'nome.required' => 'Seu jogo necessita ter um nome',
        'descricao.required' => 'Acrescente uma descricao ao produto que esta adicionando ao nosso site.',
        //'video.url'=> 'Adicione uma URL valida para o video que irá compor o seu jogo',
        'preco.numeric' =>'Utilize apenas numeros para expressar o preco do seu produto',
        'preco.required' =>'É essencial colocar o preco que a chave do seu produto será vendida.',
      ];
    }


}
