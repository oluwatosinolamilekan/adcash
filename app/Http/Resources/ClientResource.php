<?php

namespace App\Http\Resources;

use App\Models\ClientStock;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'volume' => $this->client->volume ?? 0,
            'unit_price' => $this->stock->unit_price ?? 0,
            'stocks' => ClientStockResource::collection($this->whenLoaded('client_stocks')),
        ];
    }
}
