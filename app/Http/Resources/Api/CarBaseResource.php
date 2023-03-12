<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CarBaseResource extends JsonResource
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

            'name' => $this->name,
            'vin' => $this->vin,
            'number' => $this->number,
            'marka' => $this->marka,
            'model' => $this->model,
            'color' => $this->color,
            'year'  => $this->year
        
        ];
    }
}
