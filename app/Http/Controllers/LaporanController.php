<?php

namespace App\Http\Controllers;

use App\Models\T_pesanan;
use App\Nama_usaha;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $title = 'Transaksi Pesanan';
        $data = T_pesanan::orderBy('created_at', 'desc')->get();
        return view('laporan.index', compact('title', 'data'));
    }
    public function laporanpdfall(Request $request)
    {
        $tgl = date('d F Y');
        $grand_total = $request->grand_total;
        $total = T_pesanan::sum('grand_total', $grand_total);
        $dt = T_pesanan::get();
        $nama_usaha = Nama_usaha::first();

        $pdf = PDF::loadView('laporan.laporanpdf', compact('total', 'tgl'), ['dt' => $dt, 'nama_usaha' => $nama_usaha]);
        return $pdf->download('laporan-' . date('d F Y') . '.pdf');
    }
    public function laporanpdf(Request $request)
    {
        $tgl = date('d F Y');
        $grand_total = $request->grand_total;
        $total = T_pesanan::where('created_at', today())->sum('grand_total', $grand_total);
        $dt = T_pesanan::where('created_at', today())->get();
        $nama_usaha = Nama_usaha::first();

        $pdf = PDF::loadView('laporan.laporanpdf', compact('total', 'tgl'), ['dt' => $dt, 'nama_usaha' => $nama_usaha]);
        return $pdf->download('laporan-today-' . date('d F Y') . '.pdf');
    }
}