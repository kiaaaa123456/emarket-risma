<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
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
            'jenis' => 'require',
            'nama_produk' => 'require',
            'harga' => 'required|numeric',
        ];
    }

    public function message(){
        return [
            'jenis.required' => 'Data jenis belum dipilih atau tidak sesuai!',
            'nama_produk.required' => 'Nama paket belum diisi',
            'harga.required' => 'Harga belum diisi',
            'harga.numeric' => 'Harga bukan angka'
        ];
    }
}
