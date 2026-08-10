<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "status" => $this->status,
            "totalAmount" => $this->total_amount,
            "note" => $this->note,
            "user" => $this->whenLoaded('user', fn() => new UserResource($this->user)),
            "storeOrders" => $this->whenLoaded('storeOrders', fn() => StoreOrderResource::collection($this->storeOrders)),
            // "store" => $this->whenLoaded("stores", fn() =>  StoreResource::collection($this->stores)),
        ];
    }
}
