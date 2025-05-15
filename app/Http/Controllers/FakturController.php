<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggan;
use App\Models\DataBarang;
use App\Models\Faktur;
use App\Models\Invoice;

class FakturController extends Controller
{
    public function index()
    {
        $dp = DataPelanggan::all();
        $f = Faktur::orderBy('id', 'desc')->get();

        return view('faktur', compact('dp', 'f'));
    }

    public function invoice($id)
    {
        $faktur = Faktur::find($id);
        $invoice = Invoice::where('faktur_id', $id)->get();
        $barang = DataBarang::all();
        $pp = 0;

        return view('invoice', compact('faktur', 'invoice', 'barang', 'pp'));
    }

    public function tambah_faktur(Request $request)
    {
        $save = new Faktur;
        $save->data_pelanggan_id = $request->data_pelanggan_id;
        $save->no_faktur = $request->no_faktur; 
        $save->tanggal = $request->tanggal; 
        $save->jenis_tr = $request->jenis_tr; 
        $save->jth_tempo = $request->jth_tempo; 
        
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_faktur(Request $request, $id)
    {

        Faktur::where('id', $id)->update([
            
            'no_faktur' => $request->no_faktur,
            'tanggal' => $request->tanggal,
            'jenis_tr' => $request->jenis_tr,
            'jth_tempo' => $request->jth_tempo,
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function tambah_invoice(Request $request)
    {
        $save = new Invoice;
        $save->faktur_id = $request->faktur_id; 
        $save->data_barang_id = $request->data_barang_id; 
        $save->nama_barang = $request->nama_barang;
        $save->harga_barang = $request->harga_barang;
        $save->harga_grosir = $request->harga_grosir;
        $save->ongkos_toko = $request->ongkos_toko;
        $save->disc = $request->disc; 
        $save->jumlah = $request->jumlah;
        $save->jenis_tr = $request->jenis_tr; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_invoice(Request $request, $id)
    {

        Invoice::where('id', $id)->update([
            
            'harga_grosir' => $request->harga_grosir,
            'jumlah' => $request->jumlah,
            'ongkos_toko' => str_replace('.','',$request->ongkos_toko),
            'disc' => $request->disc,
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_invoice($id)
    {
        $kategori_barang = Invoice::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function cetak_invoice($id)
    {
        $faktur = Faktur::find($id);
        $invoice = invoice::where('faktur_id', $id)->get();
        $barang = DataBarang::all();
        $pp = 0;
        return view('cetak_invoice', compact('faktur', 'invoice', 'barang', 'pp'));
    }
}