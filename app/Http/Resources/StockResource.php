<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
          'unit_price' => $this->unit_price,
          'created_at' => $this->created_at,
          'updated_at' => date('d/m/Y', strtotime($this->updated_at)),
        ];
    }
}
