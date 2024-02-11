<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image_edit' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'string', 'max:200'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'brand_id' => ['required'],
            // 'price' => ['required'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'product_type' => ['required'],
            'status' => ['required'],
        ];
    }
}