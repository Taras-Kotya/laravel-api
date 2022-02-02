<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gos_nomer' => $this->gos_nomer,
            'color' => $this->color,
            'vin' => $this->vin,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year
        ];
    }

}
