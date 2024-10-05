<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
                'string', 'max:255'
            ],
            'stock' => [
                'integer'
            ],
            'price' => [
                'numeric'
            ],
            'status' => [
                'string', Rule::enum(ProductStatusEnum::class)
            ],
            'ean_13' => [
                'string', 'size:13'
            ],
        ];
    }
}
