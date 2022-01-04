<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => ['sometimes', 'string', Rule::unique('users', 'nik')],
            'name' => ['string'],
            'phone' => ['sometimes','string', Rule::unique('users', 'phone')],
            'email' => ['sometimes', 'email', Rule::unique('users', 'email'), 'string'],
            'address' => ['string'],
            'wilayah_id' => ['string'],
            'jk' => ['string'],
            'agama_id' => ['nullable'],
            'pendidikan_id' => ['nullable'],
            'pekerjaan_id' => ['nullable'],
            'penghasilan_id' => ['nullable'],
        ];
    }

    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        return $sanitized;
    }
}
