<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paket;

class Paket_controller extends Controller
{
    public function index()
    {
        $title = 'Paket Laundry';
        $data = Paket::all();
        //  dd($data);
        return view('paket.index', compact('title', 'data'));
    }
    public function add()
    {
        $title = 'Tambah Paket Laundry';

        return view('paket.add', compact('title'));
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
            'harga' => 'required',

        ], $messages);
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');



        Paket::insert($data);

        return redirect('paket-laundry')->with('sukses', 'Data berhasil ditambah');;
    }
    public function edit($id)
    {
        $dt = Paket::find($id);
        $title = "Edit Paket $dt->nama";

        return  view('paket.edit', compact('title', 'dt'));
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
            'harga' => 'required',

        ], $messages);
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        Paket::where('id', $id)->update($data);

        return redirect('paket-laundry')->with('sukses', 'Data berhasil diupdate');;

        return redirect('paket-laundry');
    }
    public function delete($id)
    {
        try {
            $data = Paket::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        }
    }
}
