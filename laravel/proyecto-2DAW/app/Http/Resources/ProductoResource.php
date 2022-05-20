<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'titulo' => Str::upper($this->titulo),
            'descripcion' => $this->descripcion,
            'categoria_prenda' => $this->categoria_prenda,
            'genero' => $this->genero,
            'marca' => $this->marca,
            'precio' => $this->precio,
        ];
    }

    public function with($request)
    {
        return [
            'res' => true,
        ];
    }
}
