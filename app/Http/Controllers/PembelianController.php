<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\PaketImport;
use App\Imports\PembelianImport;
use Maatwebsite\Excel\Facades\Excel;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId  = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastId== null?'P00000001':sprintf('P%08d', substr($lastId->kode_masuk,1)+1));
        $data['pemasok'] = Pemasok::get();
        $data['barang'] = Barang::get();
        // return 'hjkg';
        return view('pembelian/index')->with($data);
    }

    public function history()
    {
        $data['pembelian'] = DB::table('pembelian')
            ->join('pemasok', 'pembelian.pemasok_id', '=', 'pemasok.id')
            ->join('users', 'pembelian.user_id', '=', 'users.id')
            ->select('pembelian.*', 'pemasok.nama_pemasok', 'users.name')
            ->get();
        return view('pembelian/history')->with($data);
    }

    public function importData(){
        Excel::import(new PembelianImport, request()->file('import'));

        return redirect(request()->segment(1).'/pembelian')->with('success', 'Import data pembelian berhasil!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembelianRequest $request)
    {
        // dd($request);
        //input pembelian
        $data['kode_masuk'] = $request['kode_masuk'];
        $data['tanggal_masuk'] = $request['tanggal_masuk'];
        $data['total'] = $request['total'];
        $data['pemasok_id'] = $request['pemasok_id'];
        $data['user_id'] = 1;

        $input_pembelian = Pembelian::create($data);

        //input detail pembelian
        $barang_id = $request->barang_id;
        $harga_beli = $request->harga_beli;
        $jumlah = $request->jumlah;
        $sub_tptal = $request->sub_total;

        foreach($barang_id as $i => $v){
            $data2['pembelian_id'] = $input_pembelian->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_beli'] = $harga_beli[$i];
            $data2['jumlah'] = $jumlah[$i];
            $input_detail_pembelian = DetailPembelian::create($data2);
        }
        return redirect('pembelian')->with('success', 'input berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        $pembelian->update($request->all());
        return redirect('pembelian')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect('pembelian')->with('success','Data produk berhasil dihapus!');
    }
}