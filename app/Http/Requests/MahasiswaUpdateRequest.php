<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaUpdateRequest extends FormRequest
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
                'name' => 'string',
                'nim' => 'string',
                'universitas' => 'string',
                'keterangan' => 'string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Nama harus berupa teks.',
            'nim.string' => 'NIM harus berupa teks.',
            'universitas.string' => 'Universitas harus berupa teks.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];
    }
}
