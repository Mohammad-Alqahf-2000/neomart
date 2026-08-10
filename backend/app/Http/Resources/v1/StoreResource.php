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
    protected bool $showTaxes;
    public function __construct($resource, bool $showTaxes = true)
    {
        parent::__construct($resource);
        $this->showTaxes = $showTaxes;
    }

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "enDescription" => $this->en_description,
            "arDescription" => $this->ar_description,
            "taxRate" => $this->when($this->showTaxes ?? false, $this->tax_rate),
            "taxType" => $this->when($this->showTaxes ?? false, $this->tax_type),
            "logo" => $this->logo,
            "user" => $this->whenLoaded("user", fn() => new UserResource($this->user)),
        ];
    }
}
