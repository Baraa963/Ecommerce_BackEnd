<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'productImg' => 'nullable|string|max:255', // Optional, URL or string path
            'productTitle' => 'required|string|max:255',
            'productPrice' => 'required|numeric|between:0,999999.99',
            'productDescription' => 'required|string',
            'productRating' => 'required|numeric|between:0,5',
            'productCategory' => 'nullable|string|max:255',
        ];
    }
}
