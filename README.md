<h1 align="center">Selamat datang di Sistem Informasi Laundry 👋</h1>

<!-- ## Apa itu Sistem Informasi Perpustakaan?

Web Sistem Informasi Akademik Sekolah yang dibuat berdasarkan pengembangan dari <a href="https://github.com/adhiariyadi"> Adhi Ariyadi </a>. **Sistem Informasi Akademik Sekolah adalah Website untuk para siswa dapat melihat jadwal pelajaran, dan nilai rapot dan para guru dapat menambahkan nilai siswa dengan muda melalui website.** -->

## Fitur apa saja yang tersedia di Sistem ini?

- Autentikasi Admin dan Karyawan

## Admin
- Paket Laundry CRUD
- Customer CRUD
- Karyawan CRUD
- Status Pesanan CRUD
- Status Pembayaran CRUD
- Transaksi Pesanan
- Laporan
- Dan lain-lain

## Karyawan
- Transaksi Pesanan
- Laporan
- Dan lain-lain



---

## Install

1. **Clone Repository**

```bash
git clone https://github.com/septianawijayanto/laundry-master.git
cd laundry-master
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=db_laundry
DB_USERNAME=root
DB_PASSWORD=

```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

4. **Jalankan website**

```bash
php artisan serve
```
5. **Authentikasi**

```bash
##Admin
Username : admin
Password : admin123

##Karyawan
Username : karyawan
Password : karyawan123
```

## Author
- **Facebook  <a href="https://www.facebook.com/septianawijayanto/">Septiana Wijayanto</a>**
- **Instagram  <a href="https://www.instagram.com/septianawijayanto/">@septianawijayannto</a>**



## License

- Copyright © 2021 Septiana Wijayanto.
- **Sistem Informasi Laundry is open-sourced software licensed under the MIT license.**
<!-- - **Thanks To <a href="https://github.com/septianawijayanto"> Septiana Wijayanto </a>** -->
