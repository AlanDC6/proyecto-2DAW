<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Productos_pedidoResource extends JsonResource
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
            'id_pedido' => $this->id_pedido,
            'id_prenda' => $this->id_prenda,
        ];
    }

    public function with($request)
    {
        return [
            'res' => true,
        ];
    }
}
