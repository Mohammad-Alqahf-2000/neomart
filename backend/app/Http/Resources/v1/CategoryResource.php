<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "enName" => $this->en_name,
            'arName' => $this->ar_name,
            'enDescription' => $this->en_description,
            'arDescription' => $this->ar_description,
            "sub-categories" => $this->whenLoaded("subCategories", function () {
                return $this->subCategories->pluck('id');
            })
        ];
    }
}
