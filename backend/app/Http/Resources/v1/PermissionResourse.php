<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResourse extends JsonResource
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
            "slug" => $this->slug,
            "roles" => $this->whenLoaded("roles", function () {
                return $this->roles->pluck('id');
            })
        ];
    }
}
