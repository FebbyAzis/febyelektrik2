<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggan;
use App\Models\Invoice;
use App\Models\Faktur;

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

    public function faktur_pelanggan($id)
    {
        $p = DataPelanggan::find($id);
        $fp = Faktur::where('data_pelanggan_id', $id)->orderBy('id', 'desc')->get();

        return view('faktur_pelanggan', compact('p', 'fp'));
    }

    public function invoice_pelanggan($id)
    {
        $faktur = Faktur::find($id);
        $inv = Invoice::where('faktur_id', $id)->orderBy('id', 'desc')->get();
        $pp = 0;

        return view('invoice_pelanggan', compact('faktur', 'inv', 'pp'));
    }

    public function cetak_invoice_pelanggan($id)
    {
        $faktur = Faktur::find($id);
        $inv = Invoice::where('faktur_id', $id)->orderBy('id', 'desc')->get();
        $pp = 0;

        return view('cetak_invoice_pelanggan', compact('faktur', 'inv', 'pp'));
    }
    
}
