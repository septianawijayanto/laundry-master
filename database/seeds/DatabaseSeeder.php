<?php

use App\Models\Status_pembayaran;
use App\Models\Status_pesanan;
use App\Nama_usaha;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'role' => '1',
            'name' => 'Adminisator',
            'email' => 'admin@laundry.com',
            'password' => bcrypt('admin123'),

        ]);
        User::create([
            'username' => 'karyawan',

            'name' => 'Karyawan',
            'email' => 'karyawan@laundry.com',
            'password' => bcrypt('karyawan123'),

        ]);
        Status_pesanan::create([
            'nama' => 'Diterima',
            'urutan' => '1',
        ]);
        Status_pesanan::create([
            'nama' => 'Dicuci',
            'urutan' => '2',
        ]);
        Status_pesanan::create([
            'nama' => 'Dijemur',
            'urutan' => '3',
        ]);
        Status_pesanan::create([
            'nama' => 'Selesai',
            'urutan' => '4',
        ]);
        Status_pembayaran::create([
            'nama' => 'Belum Dibayar',
            'urutan' => '1',
        ]);
        Status_pembayaran::create([
            'nama' => 'Lunas',
            'urutan' => '2',
        ]);
        Nama_usaha::create(
            ['nama' => 'My Laundry']
        );
        // $this->call(UserSeeder::class);
    }
}
