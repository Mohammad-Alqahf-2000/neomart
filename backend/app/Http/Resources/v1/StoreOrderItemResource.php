<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreOrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "productId" => $this->product_id,
            "productName" => $this->product_name,
            "productPrice" => $this->product_price,
            "quantity" => $this->quantity,
            "createdAt" => $this->created_at,
            "storeOrderId" => $this->whenLoaded('storeOrder', $this->store_order_id)    
        ];
    }
}
