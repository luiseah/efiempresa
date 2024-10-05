<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'max:255'
            ],
            'stock' => [
                'required', 'integer'
            ],
            'price' => [
                'required', 'numeric'
            ],
            'status' => [
                'required', 'string', Rule::enum(ProductStatusEnum::class)
            ],
            'ean_13' => [
                'required', 'string', 'size:13'
            ],
        ];
    }
}
