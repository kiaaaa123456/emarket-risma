<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebarangRequest extends FormRequest
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
            'nama_barang' => 'required'
        ];
    }

    public function messages(){
        return [
            'nama.required' => 'Data nama barnag belum diisi!'
        ];
    }

    public function store(StoreBarangRequest $request){
        try {
            DB::beginTransaction();
            produk::create($request->all());

            DB::commit();

            return redirect('barang')->with('succes',"inputdata berhasil!");
        }catch (QueryExceptain | Exception | PDOException $error){
            DB::rollBack();
            $this->failResponse($error->getMessege(),$error->getCode());
        }
    }
}
