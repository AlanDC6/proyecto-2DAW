<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrendasResource extends JsonResource
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
            'categoria_ropa' => $this->categoria_ropa,
            'color' => $this->color,
            'talla' => $this->talla,
        ];
    }

    public function with($request)
    {
        return [
            'res' => true,
        ];
    }
}
