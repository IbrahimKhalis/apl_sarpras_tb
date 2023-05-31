<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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
            'kategori_id' => ['string'],
            'sub_kategori_id' => ['string'],
            // 'jurusan_id' => ['string'],
            'nama' => ['string'],
            'kode' => 'unique:produks',
            'merek' => ['string'],
            'kondisi' => ['string'],
            'ket_produk' => ['string'],
            'ket_kondisi' => ['string'],
            'jumlah' => ['string'],
            'fotos.*' => 'file|max:5025|image'
        ];
    }
}
