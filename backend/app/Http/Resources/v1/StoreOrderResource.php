<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreOrderResource extends JsonResource
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
            "shippingCost" => $this->shipping_cost,
            "taxRate" => $this->tax_rate,
            "taxAmount" => $this->tax_amount,
            "taxType" => $this->tax_type,
            "totalSub" => $this->total_sub,
            "total" => $this->total,
            "order" => $this->whenLoaded("order", fn() => new OrderResource($this->order)),
            "store" => $this->whenLoaded("store", fn() => new StoreResource($this->store, false)),
            "orderItems" => $this->whenLoaded('storeOrderItems',StoreOrderItemResource::collection($this->storeOrderItems)),
        ];
    }
}
