<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function data_barang()
    {
        $db = DataBarang::orderBy('id', 'desc')->get();
        return view('data_barang', compact('db'));
    }

    public function tambah_barang(Request $request)
    {
        $save = new DataBarang;
        $save->kode_barang = $request->kode_barang;
        $save->kategori_barang = $request->kategori_barang; 
        $save->nama_barang = $request->nama_barang; 
        $save->qty = $request->qty; 
        $save->isi = $request->isi; 
        $save->harga_barang = str_replace('.','',$request->harga_barang);
        $save->grosir_1 = str_replace('.','',$request->grosir_1);
        $save->grosir_2 = str_replace('.','',$request->grosir_2);
        $save->grosir_3 = str_replace('.','',$request->grosir_3);
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_barang(Request $request, $id)
    {

        DataBarang::where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'kategori_barang' => $request->kategori_barang,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'isi' => $request->isi,
            'harga_barang' => str_replace('.','',$request->harga_barang),
            'grosir_1' => str_replace('.','',$request->grosir_1),
            'grosir_2' => str_replace('.','',$request->grosir_2),
            'grosir_3' => str_replace('.','',$request->grosir_3),
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_barang($id)
    {
        $db = DataBarang::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }
}
