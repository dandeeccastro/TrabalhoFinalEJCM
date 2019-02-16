<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JogoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
          'foto' => $this->foto,
          'nome' => $this->nome,
          'descricao' => $this->descricao,
          'categoria_id'=>$this->categoria_id,
          'preco'=>$this->preco,
        ];
    }
}
