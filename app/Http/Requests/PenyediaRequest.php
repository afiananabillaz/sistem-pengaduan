<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenyediaRequest extends FormRequest
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
            'npwp' => 'required|max:20|string',
            'nama' => 'required|max:255|string',
            'no_hp' => 'required|max:12|string'
        ];
    }
}
