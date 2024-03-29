<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rencana' => ['required'],
            'tgl_rencana' => ['required'],
            'investor_id' => ['required'],
            'sektor_id' => ['required'],
            'wilayah_id' => ['required'],
        ];
    }
}
