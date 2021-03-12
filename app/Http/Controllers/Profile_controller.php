<?php

namespace App\Http\Controllers;

use App\Nama_usaha;
use Illuminate\Http\Request;

class Profile_controller extends Controller
{
    public function index()
    {
        $title = 'Manage Nama Usaha';
        $dt = Nama_usaha::first();

        return view('nama_usaha.index', compact('title', 'dt'));
    }

    public function update(Request $request)
    {
        try {
            // 

            // Nama_usaha::update($data);
            $dt = Nama_usaha::first();

            $dt->nama = $request->nama;
            $dt->created_at = date('Y-m-d H:i:s');
            $dt->updated_at = date('Y-m-d H:i:s');
            $dt->save();

            return redirect()->back()->with('sukses', 'Data berhasil di update');
        } catch (\Exception $e) {

            return redirect()->back()->with('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
}
