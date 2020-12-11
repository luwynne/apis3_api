<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){

        if ($this->resource == null) {
            return;
        }

        $product = $this->resource;

        return [
            'id' => $product->id_externo,
            'nome' => $product->nome,
            'quantidade' => $product->quantidade
        ];
    }
}
