<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\models\Paket;
use App\Models\T_pesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Beranda_controller extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $title = 'Beranda Admin';
        } else {
            $title = 'Beranda Karyawan';
        }


        $cs = Customer::count();
        $tp = T_pesanan::count();
        $u = User::count();
        $pl = Paket::count();

        return view('beranda.index', compact('title', 'cs', 'tp', 'u', 'pl'));
    }
}
