<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status_pesanan;

class Status_pesanan_controller extends Controller
{
    public function index()
    {
        $title = 'Status Pesanan';
        $data = Status_pesanan::orderBy('nama', 'asc')->get();

        return view('status_pesanan.index', compact('title', 'data'));
    }
    public function add()
    {
        $title = 'Tambah status pesanan';

        return view('status_pesanan.add', compact('title'));
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

            'urutan' => 'required',
            'nama' => 'required',

        ], $messages);


        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Status_pesanan::insert($data);

        return redirect('status-pesanan')->with('sukses', 'Data berhasil ditambah');;
    }
    public function edit($id)
    {
        $dt = Status_pesanan::find($id);
        $title = "Edit status $dt->nama";

        return  view('status_pesanan.edit', compact('title', 'dt'));
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

            'urutan' => 'required',
            'nama' => 'required',

        ], $messages);

        $data['nama'] = $request->nama;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['urutan'] = $request->urutan;
        Status_pesanan::where('id', $id)->update($data);


        return redirect('status-pesanan')->with('sukses', 'Data berhasil diupdate');;

        return redirect('status-pesanan');
    }
    public function delete($id)
    {
        try {
            $data = Status_pesanan::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        };
    }
}
