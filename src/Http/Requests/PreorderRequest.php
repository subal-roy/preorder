<?php

namespace SubalRoy\Preorder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreorderRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required_if:email,/@xyz.com$/|nullable|string|max:20',
            'product' => 'required|string',
        ];
    }
}
