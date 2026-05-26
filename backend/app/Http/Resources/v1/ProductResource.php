<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\SubCategoryResource;
use App\Http\Resources\v1\BrandResource;
use App\Http\Resources\v1\StoreResource;

class ProductResource extends JsonResource
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
            "enName" => $this->en_name,
            "arName" => $this->ar_name,
            "enDescription" => $this->en_description,
            "arDescription" => $this->ar_description,
            "stock" => $this->stock,
            "price" => $this->price,
            "availability" => $this->availability,
            "type" => $this->type,
            "brand" => $this->whenLoaded('brand', fn() => new BrandResource($this->brand)),
            "store" => $this->whenLoaded('store', fn() => new StoreResource($this->store)),
            "sub-category" => $this->whenLoaded('subCategory', fn() => new SubCategoryResource($this->subCategory)),
            "createdAt" => $this->created_at,
        ];
    }
}
