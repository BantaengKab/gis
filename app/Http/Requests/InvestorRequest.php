<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestorRequest extends FormRequest
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



        // if (request()->isMethod('post')) {
        //     $rules = [
        //         'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
        //         'name' => 'required|unique:categories'
        //     ];
        // } elseif (request()->isMethod('PUT')) {
        //     $rules = [
        //         'name' => 'required|unique:categories,name'
        //     ];
        // }


        // return $rules;


        return [
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
            'nib' => ['required', 'string'],

        ];
    }
}