<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateprojectRequest extends FormRequest
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
            'title' => 'required|max:255|min:3',
            'content' => 'nullable',
            'image' => 'nullable|max:255',
            'category_id'=>'nullable|exists:categories,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',
            'title.min' => 'Il titolo deve essere di almeno 3 caratteri.',
            'image.max' => "L'URL dell'immagine non può superare i 255 caratteri.",
            'category_id.exists' => 'La categoria selezionata non è valida.'
        ];
    }
}
