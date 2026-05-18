<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            "name" => $this->name,
            "enDescription" => $this->en_description,
            "arDescription" => $this->ar_description,
            "logo" => $this->logo,
            "user" => $this->whenLoaded("user", fn() => new UserResource($this->user)),
        ];
    }
}
