<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\models\Paket;
use App\Models\Status_pembayaran;
use App\Models\Status_pesanan;
use App\Models\T_pesanan;
use App\Nama_usaha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class TransaksiPesananController extends Controller
{
    public function index()
    {
        $title = 'Transaksi Pesanan';
        $data = T_pesanan::orderBy('created_at', 'desc')->get();
        return view('t_pesanan.index', compact('title', 'data'));
    }
    public function periode(Request $request)
    {
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;

            $title = "Transaksi Pesanan dari $dari sampai $sampai";

            $data = T_pesanan::whereDate('created_at', '>=', $dari)->whereDate('created_at', '<=', $sampai)->orderBy('created_at', 'desc')->get();

            return view('t_pesanan.index', compact('title', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function export($id)
    {
        try {
            $dt = T_pesanan::find($id);
            $nama_usaha = Nama_usaha::first();

            $pdf = PDF::loadView('t_pesanan.pdf', ['dt' => $dt, 'nama_usaha' => $nama_usaha]);
            return $pdf->download('t_pesanan.pdf');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('gagal', $e->getMessage());
        }
    }
    public function naikkan_status($id)
    {
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pesanan_id;
            $urutan_status = $transaksi->status_pesanan->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pesanan::where('urutan', $urutan_baru)->first();

            T_pesanan::where('id', $id)->update([
                'status_pesanan_id' => $status_baru->id
            ]);

            return redirect()->back()->with('sukses', 'Status pesanan berhasil dinaikkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function naikkan_status_pembayaran($id)
    {
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pembayaran_id;
            $urutan_status = $transaksi->status_pembayaran->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pembayaran::where('urutan', $urutan_baru)->first();

            T_pesanan::where('id', $id)->update([
                'status_pembayaran_id' => $status_baru->id
            ]);
            return redirect()->back()->with('sukses', 'Status pembayaran berhasil dinaikkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
    public function add()
    {
        $title = 'Tambah Pesanan';
        $customer = Customer::orderBy('nama', 'asc')->get();
        $paket = Paket::orderBy('nama', 'asc')->get();
        $status_pesanan = Status_pesanan::orderBy('urutan', 'asc')->get();
        $status_pembayaran = Status_pembayaran::orderBy('nama', 'asc')->get();
        return view('t_pesanan.add', compact('title', 'customer', 'paket', 'status_pesanan', 'status_pembayaran'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'gambar.mimes' => 'Format Foto jpeg/png',
        ];
        //dd($request->all());
        $this->validate($request, [

            'customer_id' => 'required',
            'paket_id' => 'required',
            'status_pesanan_id' => 'required',
            'status_pembayaran_id' => 'required',
            'berat' => 'required',
        ], $messages);

        $data['customer_id'] = $request->customer_id;
        $data['paket_id'] = $request->paket_id;
        $data['status_pembayaran_id'] = $request->status_pembayaran_id;
        $data['status_pesanan_id'] = $request->status_pesanan_id;

        $data['berat'] = $request->berat;
        $data['created_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $harga = Paket::find($request->paket_id);
        $harga_paket = $harga->harga;
        $berat = $request->berat;
        $grand_total = $harga_paket * $berat;
        $data['grand_total'] = $grand_total;
        T_pesanan::insert($data);

        return redirect('transaksi-pesanan')->with('sukses', "Data Berhasil Ditambah");
    }
    public function edit($id)
    {
        $title = 'Edit Data';
        $dt = T_pesanan::find($id);
        $customer = Customer::orderBy('nama', 'asc')->get();
        $paket = Paket::orderBy('nama', 'asc')->get();
        $status_pesanan = Status_pesanan::orderBy('urutan', 'asc')->get();
        $status_pembayaran = Status_pembayaran::orderBy('nama', 'asc')->get();
        return view('t_pesanan.edit', compact('title', 'dt', 'customer', 'paket', 'status_pesanan', 'status_pembayaran'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'gambar.mimes' => 'Format Foto jpeg/png',
        ];
        //dd($request->all());
        $this->validate($request, [

            'customer_id' => 'required',
            'paket_id' => 'required',
            'status_pesanan_id' => 'required',
            'status_pembayaran_id' => 'required',
            'berat' => 'required',
        ], $messages);

        $data['customer_id'] = $request->customer_id;
        $data['paket_id'] = $request->paket_id;
        $data['status_pembayaran_id'] = $request->status_pembayaran_id;
        $data['status_pesanan_id'] = $request->status_pesanan_id;

        $data['berat'] = $request->berat;
        //  $data['created_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $harga = Paket::find($request->paket_id);
        $harga_paket = $harga->harga;
        $berat = $request->berat;
        $grand_total = $harga_paket * $berat;
        $data['grand_total'] = $grand_total;
        T_pesanan::where('id', $id)->update($data);

        return redirect('transaksi-pesanan')->with('sukses', "Data Berhasil Diedit");
    }
    public function delete($id)
    {
        try {
            $data = T_pesanan::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        }
    }
}
