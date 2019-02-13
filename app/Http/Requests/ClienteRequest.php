<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
          'numeroCartao'=>'required|numeric',
          'nomeTitularCartao'=>'required|alpha',
          'codigoSegurancaCartao'=>'required|min:3|numeric',
          'bandeiraCartao'=>'required',
          'dataDeVencimentoCartao'=>'data|required',
          //regras para método post
        ];
      }
      if ($this->isMethod('put')){
        return [
          'numeroCartao'=>'|numeric',
          'nomeTitularCartao'=>'alpha',
          'codigoSegurancaCartao'=>'min:3|numeric',
          'dataDeVencimentoCartao'=>'data',
          //regras para método put
        ];
      }
    }
    public function messages() {
      return [
        'numeroCartao.required' => 'É obrigatorio  colocar o seu numero de cartão',
        'numeroCartao.numeric'=> 'Seu numero de cartão deve conter apenas algoritmos numericos',
        'nomeTitularCartao.required' => 'É necessario o nome do titular do cartão para efetuar a compra',
        'nomeTitularCartao.alpha' => 'Apenas caracteres alfabeticos são aceitos para preencher esse campo.',
        'codigoSegurancaCartao.required'=> 'Adicione seu codigo de segurança para que a compra seja efetuada com sucesso.',
        'codigoSegurancaCartao.numeric' =>'Utilize apenas numeros para o codigo de segurança',
        'bandeiraCartao.required' =>'É essencial colocar a bandeira do seu cartão.',
        'dataDeVencimentoCartao.data'=> 'Adicione uma data de vencimento valida, o formato esta incorreto.',
        'dataDeVencimentoCartao.required' => 'É necessario o uso de uma data de vencimento para o seu cartão.',
      ];
    }

}
