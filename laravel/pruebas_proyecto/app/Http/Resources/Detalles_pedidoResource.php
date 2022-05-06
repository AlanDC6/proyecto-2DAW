<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Detalles_pedidoResource extends JsonResource
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
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'pais' => $this->pais,
            'ciudad' => $this->ciudad,
            'codigo_postal' => $this->codigo_postal,
            'direccion_calle' => $this->direccion_calle,
            'direccion2' => $this->direccion2,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'otras_notas' => $this->otras_notas,
        ];
    }

    public function with($request)
    {
        return [
            'res' => true,
        ];
    }
}
