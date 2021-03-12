<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status_pembayaran;

class Status_pembayaran_controller extends Controller
{
    public function index()
    {
        $title = 'Master status pembayaran';
        $data = Status_pembayaran::orderBy('nama', 'asc')->get();
        return view('status_pembayaran.index', compact('title', 'data'));
    }
    public function add()
    {
        $title = 'Tambah status pembayaran';

        return view('status_pembayaran.add', compact('title'));
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


            'nama' => 'required',
            'urutan' => 'required',
        ], $messages);

        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Status_pembayaran::insert($data);

        return redirect('status-pembayaran')->with('sukses', 'Data berhasil ditambah');;
    }
    public function edit($id)
    {
        $dt = Status_pembayaran::find($id);
        $title = "Edit status pembayaran $dt->nama";

        return  view('status_pembayaran.edit', compact('title', 'dt'));
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

            'nama' => 'required',
            'urutan' => 'required',

        ], $messages);


        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Status_pembayaran::where('id', $id)->update($data);


        return redirect('status-pembayaran')->with('sukses', 'Data berhasil diupdate');;
    }
    public function delete($id)
    {
        try {
            $data = Status_pembayaran::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        }
    }
}
