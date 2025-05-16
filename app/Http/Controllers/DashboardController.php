<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faktur;
use App\Models\Invoice;
use App\Models\Utang;
use App\Models\UtangBayar;
use App\Models\Piutang;
use App\Models\DataBarang;
use App\Models\DataPelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $dp = DataPelanggan::count('id');
    //     $db = DataBarang::count('id');
    //     $f = Faktur::count('id');
    //     $i = Invoice::count('id');
    //     $p = Faktur::where('jenis_tr', 'Grosir 2')->where('status', 1)->count('id');
    //     $u = Utang::where('status', 1)->count('id');
    //     $utang = Utang::sum('nominal_utang');
    //     $ub = UtangBayar::sum('nominal_pembayaran');
    //     $inv = Invoice::all();
    //     $invo = Invoice::where('jenis_tr', 'Grosir 2')->get();
    //     $piutang = Piutang::sum('nominal_pembayaran');
    //     $pp = 0;
    //     $ppp = 0;
    //     $plo = 0;

    //     $now = Carbon::now();
    //     $bulanIni = $now->month;
    //     $tahunIni = $now->year;
    
    //     $invoiceBulanIni = Invoice::whereMonth('created_at', $bulanIni)
    //         ->whereYear('created_at', $tahunIni)
    //         ->get();
    
    //     $totalPenjualan = 0;
    
    //     foreach ($invoiceBulanIni as $item) {
    //         $ongkos = $item->ongkos_toko * $item->jumlah;
    //         $total = ($item->harga_grosir * $item->jumlah) + $ongkos;
    //         $diskon = ($total * $item->disc) / 100;
    //         $jumlahAkhir = $total - $diskon;
    
    //         $totalPenjualan += $jumlahAkhir;
    //     }

    //     return view('dashboard', compact('dp', 'db', 'f', 'i', 'p', 'u', 'utang', 'ub'
    //     , 'inv', 'piutang', 'pp', 'ppp', 'invo', 'plo'),
    //     [
    //         'totalPenjualan' => $totalPenjualan,
    //         'bulan' => $now->translatedFormat('F Y') // Contoh: "Mei 2025"
    //     ]);
    // }

    // public function index()
    // {
    //     $dp = DataPelanggan::count();
    //     $db = DataBarang::count();
    //     $f = Faktur::count();
    //     $i = Invoice::count();
    //     $p = Faktur::where('jenis_tr', 'Grosir 2')->where('status', 1)->count();
    //     $u = Utang::where('status', 1)->count();

    //     $utang = Utang::sum('nominal_utang');
    //     $ub = UtangBayar::sum('nominal_pembayaran');
    //     $piutang = Piutang::sum('nominal_pembayaran');

    //     $inv = Invoice::select(DB::raw("DATE(created_at) as tanggal"))
    //         ->distinct()
    //         ->orderBy('created_at')
    //         ->pluck('tanggal');

    //     $tanggalList = [];
    //     $penjualanList = [];

    //     foreach ($inv as $tgl) {
    //         $invoiceHarian = Invoice::all();
    //         $invoHarian = Invoice::where('jenis_tr', 'Grosir 2')->get();
    //         $$invoiceHarians = Invoice::whereDate('created_at', $tgl)->get();
    //         $invoHarians = Invoice::whereDate('created_at', $tgl)->where('jenis_tr', 'Grosir 2')->get();
            

    //         foreach ($invoiceHarian as $item) {
    //             $o = $item->ongkos_toko * $item->jumlah;
    //             $y = $item->harga_grosir * $item->jumlah + $o;
    //             $t = ($y * $item->disc) / 100;
    //             $ya = $y - $t;
    //             $pp += $ya;
    //         }

    //         foreach ($invoHarian as $item) {
    //             $o = $item->ongkos_toko * $item->jumlah;
    //             $y = $item->harga_grosir * $item->jumlah + $o;
    //             $t = ($y * $item->disc) / 100;
    //             $ya = $y - $t;
    //             $ppp += $ya;
    //         }

    //         foreach ($invoiceHarians as $item) {
    //             $o = $item->ongkos_toko * $item->jumlah;
    //             $y = $item->harga_grosir * $item->jumlah + $o;
    //             $t = ($y * $item->disc) / 100;
    //             $ya = $y - $t;
    //             $pppp += $ya;
    //         }

    //         foreach ($invoHarians as $item) {
    //             $o = $item->ongkos_toko * $item->jumlah;
    //             $y = $item->harga_grosir * $item->jumlah + $o;
    //             $t = ($y * $item->disc) / 100;
    //             $ya = $y - $t;
    //             $ppppp += $ya;
    //         }

    //         $total = $pp - ($ppp - $piutang);
    //         $totals = $pppp - ($ppppp - $piutang);
    //         $tanggalList[] = $tgl;
    //         $penjualanList[] = $totals;
    //         $summary_ppp_piutang = $ppp - $piutang;
    //         $summary_utang_ub = $utang - $ub;
    //     }
        
    //     return view('dashboard', compact('dp', 'db', 'f', 'i', 'p', 'u', 'utang', 'ub', 'piutang', 'tanggalList', 'penjualanList', 'summary_ppp_piutang', 'summary_utang_ub'
    //     , 'total' , 'totals'));
    // }

    public function index(Request $request)
{
    $dp = DataPelanggan::count();
    $db = DataBarang::count();
    $f = Faktur::count();
    $i = Invoice::count();
    $p = Faktur::where('jenis_tr', 'Grosir 2')->where('status', 1)->count();
    $u = Utang::where('status', 1)->count();
    $utang = Utang::sum('nominal_utang');
    $ub = UtangBayar::sum('nominal_pembayaran');
    $piutang = Piutang::sum('nominal_pembayaran');
    $bulan = $request->input('bulan', now()->month);
    $tahun = $request->input('tahun', now()->year);

    $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth();
    $endDate = Carbon::create($tahun, $bulan, 1)->endOfMonth();

    $inv = Invoice::whereBetween('created_at', [$startDate, $endDate])
        ->select(DB::raw("DATE(created_at) as tanggal"))
        ->distinct()
        ->orderBy('created_at')
        ->pluck('tanggal');

    $tanggalList = [];
    $penjualanList = [];

    foreach ($inv as $tgl) {
        $invoiceHarian = Invoice::all();
        $invoHarian = Invoice::where('jenis_tr', 'Grosir 2')->get();
        $invoiceHarians = Invoice::whereDate('created_at', $tgl)->get();
        $invoHarians = Invoice::whereDate('created_at', $tgl)->where('jenis_tr', 'Grosir 2')->get();
        $invoiceHariIni = Invoice::whereDate('created_at', Carbon::today())->get();
        $invoiceHariInis = Invoice::where('jenis_tr', 'Grosir 2')->whereDate('created_at', Carbon::today())->get();
        $n = Invoice::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $nn = Invoice::where('jenis_tr', 'Grosir 2')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $m = Invoice::whereDate('created_at', Carbon::now()->day)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $mm = Invoice::where('jenis_tr', 'Grosir 2')->whereDate('created_at', Carbon::now()->day)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $pp = 0;
        $ppp = 0;
        $a = 0;
        $b = 0;
        $aa = 0;
        $bb = 0;
        $aaa = 0;
        $bbb = 0;
        
        $pppp = $invoHarians->reduce(function ($carry, $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            return $carry + ($y - $t);
        }, 0);

        $ppppp = $invoiceHarians->reduce(function ($carry, $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            return $carry + ($y - $t);
        }, 0);

        foreach ($invoiceHarian as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $pp += $ya;
        }

        foreach ($invoHarian as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $ppp += $ya;
        }

        foreach ($invoiceHariIni as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $a += $ya;
        }

        foreach ($invoiceHariInis as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $b += $ya;
        }

        foreach ($n as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $aa += $ya;
        }

        foreach ($nn as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $bb += $ya;
        }

        foreach ($m as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $aaa += $ya;
        }

        foreach ($mm as $item) {
            $o = $item->ongkos_toko * $item->jumlah;
            $y = $item->harga_grosir * $item->jumlah + $o;
            $t = ($y * $item->disc) / 100;
            $ya = $y - $t;
            $bbb += $ya;
        }

        $piutang = Piutang::sum('nominal_pembayaran');
        
        $total = $pp - ($ppp - $piutang);
        $totals = $aaa - ($bbb - $piutang);
        $totalss = $a - ($b - $piutang);
        $totalsss = $aa - ($bb - $piutang);

        $tanggalList[] = $tgl;
        $penjualanList[] = $totals;

        $summary_ppp_piutang = $ppp - $piutang;
        $summary_utang_ub = $utang - $ub;
    }

  

    return view('dashboard', compact(
        'dp', 'db', 'f', 'i', 'p', 'u', 'utang', 'ub', 'piutang',
        'tanggalList', 'penjualanList', 'summary_ppp_piutang', 'summary_utang_ub',
        'bulan', 'tahun', 'total' , 'totalss' , 'totalsss'
    ));
}
}
