<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResourse extends JsonResource
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
            'enName' => $this->en_name,
            'arName' => $this->ar_name,
            'slug' => $this->slug,
            // return all keys of permissions
            // "permissions" => PermissionResourse::collection($this->whenLoaded('permissions')),

            // return only ids of permissions
            "permissions" => $this->whenLoaded('permissions', function () {
                return $this->permissions->pluck('id');
            })

        ];
    }
}
