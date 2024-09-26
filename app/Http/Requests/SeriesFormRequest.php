<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => "O campo nome é obrigatório!",
            'nome.min' => "O campo deve ter mais de :min caracteres",
            'nome.string' => "O campo deve ser uma string"
        ];
    }
}
