<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faktur;
use App\Models\Invoice;
use App\Models\Utang;
use App\Models\UtangBayar;
use App\Models\Piutang;
use App\Models\DataBarang;

class UtangPiutangController extends Controller
{
    public function piutang()
    {
        $pa = Faktur::where('jenis_tr', 'Grosir 2')
        ->where('status', 1)->orderBy('id', 'desc')->get();
        $pl = Faktur::where('jenis_tr', 'Grosir 2')
        ->where('status', 2)->orderBy('id', 'desc')->get();
        return view('piutang', compact('pa', 'pl'));
    }

    public function kelola_piutang($id)
    {
        $f = Faktur::find($id);
        $inv = Invoice::where('faktur_id', $id)->orderBy('id', 'desc')->get();
        $pu = Piutang::where('faktur_id', $id)->get();
        $pp = 0;
        $k = 0;
        return view('kelola_piutang', compact('f', 'inv', 'pu', 'pp', 'k'));
    }

    public function pembayaran_piutang(Request $request)
    {
        $save = new Piutang;
        $save->faktur_id = $request->faktur_id; 
        $save->tanggal = $request->tanggal;
        $save->nominal_pembayaran = str_replace('.','',$request->nominal_pembayaran); 
        $save->save(); 
        return redirect()->back()->with('Success', 'Piutang berhasil dibayarkan!');
    }

    public function hapus_piutang($id)
    {
        $pu = Piutang::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function lunas_piutang(Request $request, $id)
    {

        Faktur::where('id', $id)->update([
            'status' => 2]);

        return redirect()->back()->with('Successs', 'Piutang telah dilunaskan');
    }

    public function utang()
    {
        $uta = Utang::where('status', 1)->orderBy('id', 'desc')->get();
        $utl = Utang::where('status', 2)->orderBy('id', 'desc')->get();
        return view('utang', compact('uta', 'utl'));
    }

    public function buat_utang(Request $request)
    {
        $save = new Utang;
        $save->toko = $request->toko; 
        $save->tanggal = $request->tanggal;
        $save->nominal_utang = str_replace('.','',$request->nominal_utang); 
        $save->keterangan = $request->keterangan;
        $save->jth_tempo = $request->jth_tempo;
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function kelola_utang($id)
    {
        $utang = Utang::find($id);
        $ub = UtangBayar::where('utang_id', $id)->orderBy('id', 'desc')->get();
        $k = 0;
        return view('kelola_utang', compact('utang', 'ub', 'k'));
    }

    public function edit_utang(Request $request, $id)
    {

        Utang::where('id', $id)->update([
            'toko' => $request->toko,
            'tanggal' => $request->tanggal,
            'nominal_utang' => str_replace('.','',$request->nominal_utang),
            'keterangan' => $request->keterangan,
            'jth_tempo' => $request->jth_tempo,
        ]);

        return redirect()->back()->with('Successs', 'Utang berhasil diedit!');
    }

    public function pembayaran_utang(Request $request)
    {
        $save = new UtangBayar;
        $save->utang_id = $request->utang_id; 
        $save->tanggal = $request->tanggal;
        $save->nominal_pembayaran = str_replace('.','',$request->nominal_pembayaran); 
        $save->save(); 
        return redirect()->back()->with('Success', 'Utang berhasil Dibayarkan!');
    }

    public function hapus_utang_bayar($id)
    {
        $ub = UtangBayar::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function lunas_utang(Request $request, $id)
    {

        Utang::where('id', $id)->update([
            'status' => 2]);

        return redirect()->back()->with('Successs', 'Utang telah dilunaskan');
    }
}
