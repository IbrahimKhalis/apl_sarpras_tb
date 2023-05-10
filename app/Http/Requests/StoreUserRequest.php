<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required|unique:users',
            'jk' => 'required', 
            'profil' => 'mimes:png,jpg,jpeg|file|max:5024'
        ];
    }
}
