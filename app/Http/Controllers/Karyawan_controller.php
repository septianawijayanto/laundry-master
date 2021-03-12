<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class Karyawan_controller extends Controller
{
    public function index()
    {
        $title = 'Master Karyawan';

        $data = User::where('role', Auth::user()->role = null)->get();

        return view('karyawan.index', compact('title', 'data'));
    }
    public function add()
    {
        $title = 'Tambah Karyawan';
        $data = User::get();
        return view('karyawan.add', compact('title'));
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
            'name' => 'required',
            'username' => 'required',

        ], $messages);
        $data['id'] = $request->id;
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = bcrypt('12345678');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $file = $request->file('avatar');
        if ($file) {
            $file->move('gambar/profil', $file->getClientOriginalName());
            $data['avatar'] =  $file->getClientOriginalName();
        }

        User::insert($data);

        return redirect('karyawan')->with('sukses', 'Data Berhasil Ditambah');
    }
    public function edit($id)
    {
        $dt = User::find($id);
        $title = "Edit Karyawan $dt->name";

        return view('karyawan.edit', compact('title', 'dt'));
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
            'name' => 'required',
            'username' => 'required',

        ], $messages);

        $data['id'] = $request->id;
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        //$data['password'] = bcrypt('12345678');
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $file = $request->file('avatar');
        if ($file) {
            $file->move('gambar/profil', $file->getClientOriginalName());
            $data['avatar'] =  $file->getClientOriginalName();
        }

        User::where('id', $id)->update($data);

        return redirect('karyawan')->with('sukses', 'Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        try {
            $data = User::find($id);
            $data->delete();

            return \redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return \redirect()->back()->with('gagal', 'Gagal Dihapus, Data Memiliki Relasi Ditabel Lain');
        }
    }
}
