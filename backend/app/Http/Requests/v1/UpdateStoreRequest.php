<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            "name"=>['required',"max:40" , "min:5" , "string"],
            "en_description"=>['max:255',"min:10","string"],
            "ar_description"=>['max:255',"min:10","string"],
            "logo"=>['file'],
        ];
    }
}
