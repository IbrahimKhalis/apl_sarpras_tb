<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSekolahRequest extends FormRequest
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
            // 'nama_sekolah' => 'required',
            // 'kode' => 'required',
            // 'npsn' => 'required',
            // 'kepala_sekolah' => 'required',
            // 'jenjang' => 'required',
            // 'alamat' => 'required',
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ];
    }
}
