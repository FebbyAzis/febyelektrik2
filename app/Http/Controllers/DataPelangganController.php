<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggan;
use App\Models\Invoice;

class DataPelangganController extends Controller
{
    public function index()
    {
        $dp = DataPelanggan::orderBy('id', 'desc')->get();

        return view('data_pelanggan', compact('dp'));
    }

    public function tambah_pelanggan(Request $request)
    {
        $save = new DataPelanggan;
        $save->nama_pelanggan = $request->nama_pelanggan;
        $save->no_tlp = $request->no_tlp; 
        $save->alamat = $request->alamat; 
         
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_pelanggan(Request $request, $id)
    {

        DataPelanggan::where('id', $id)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_pelanggan($id)
    {
        $db = DataPelanggan::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    
}
