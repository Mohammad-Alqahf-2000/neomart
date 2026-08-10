<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\ProductAvailabilityEnum;
use App\Enums\ProductTypeEnum;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // To make type lowercase like ("new" , 'used')
    protected function prepareForValidation(): void
    {
        $this->merge(['type' => strtolower($this->type)]);
    }
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            "en_name" => ["required", 'string', 'max:50', "min:3",],
            "ar_name" => ["required", 'string', 'max:50', "min:3",],
            "en_description" => ["required", 'string', 'max:255', "min:10",],
            "ar_description" => ["required", 'string', 'max:255', "min:10",],
            "stock" => ["nullable", "integer", "min:0", "max:999"],
            "price" => ["required", "numeric", "min:0", "max:9999999"],
            "availability" => [Rule::enum(ProductAvailabilityEnum::class)],
            "type" => ["required", Rule::enum(ProductTypeEnum::class)],
            "brand_id" => ["required", 'integer', 'exists:brands,id'],
            "sub_category_id" => ["required", 'integer', 'exists:sub_categories,id'],
        ];
    }
}
