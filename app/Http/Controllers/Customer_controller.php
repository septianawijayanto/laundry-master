<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class Customer_controller extends Controller
{
    public function index()
    {
        $title = 'Halaman customer';
        $data = Customer::orderBy('nama', 'asc')->get();

        return view('customer.index', compact('title', 'data'));
    }
    public function add()
    {
        $title = 'Tambah Customer';

        return view('customer.add', compact('title'));
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

            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'

        ], $messages);
        //$data['id']=$request->id;
        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        Customer::insert($data);

        return redirect('customer')->with('sukses', 'Data berhasil ditambah');;
    }
    public function edit($id)
    {
        $dt = Customer::find($id);
        $title = "edit customer $dt->nama";

        return view('customer.edit', compact('title', 'dt'));
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

            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'

        ], $messages);

        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customer::where('id', $id)->update($data);

        return redirect('customer')->with('sukses', 'Data berhasil diupdate');;
    }
    public function delete($id)
    {
        try {
            $data = Customer::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        }
    }
}
