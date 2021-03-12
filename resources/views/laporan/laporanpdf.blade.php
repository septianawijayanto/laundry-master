<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        table {
            border-spacing: 0;
            width: 100%;
        }

        th {
            border-left: 1px solid #c6c9cc;
            border-right: 1px solid #c6c9cc;
            border-bottom: 1px solid #c6c9cc;
            border-top: 1px solid #c6c9cc;
        }

        th:first-child {
            border-top-left-radius: 4px;
            border-left: 0;
        }

        th:last-child {
            border-top-right-radius: 4px;
            border-right: 1px solid #c6c9cc;
            border-left: 1px solid #c6c9cc;
            border-top: 1px solid #c6c9cc;
        }

        td {
            border-right: 1px solid #c6c9cc;
            border-bottom: 1px solid #c6c9cc;
            border-top: 1px solid #c6c9cc;
            padding: 8px;
        }

        td:first-child {
            border-left: 1px solid #c6c9cc;
            border-top: 1px solid #c6c9cc;
        }

        tr:first-child td {
            border-top: 1px solid #c6c9cc;
        }

        tr:nth-child(even) td {
            background: white;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 4px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 4px;
        }

        img {
            width: 90px;
            height: 90px;
            border-radius: 100%;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }
    </style>
    <link rel="stylesheet" href="">
    <title>Laporan Data Buku</title>
</head>

<body>
    <h1 class="center">{{ $nama_usaha->nama }}</h1>
    <hr>
    <h5 class="center"><u> LAPORAN DATA TRANSAKSI</u></h5>
    <table id="pseudo-demo">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Customer</td>
                <td>Paket</td>
                <td>Status Pesanan</td>
                <td>Status Pemabayaran</td>
                <td>Berat</td>
                <td>Grand Total</td>


                <td>Created At</td>

            </tr>
        </thead>
        <tbody>
            @foreach($dt as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->customer->nama}}</td>
                <td>{{$dt->paket->nama}}</td>
                <td>{{$dt->status_pesanan->nama}}</td>
                <td>{{$dt->status_pembayaran->nama}}</td>
                <td>{{$dt->berat}} Kg</td>
                <td>Rp.{{ number_format($dt->grand_total,0)}}</td>

                <td>{{ date('d F Y',strtotime($dt->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"><b><i>Total</i></b></td>
                <td><b><i>Rp. {{ number_format($total,0) }}</i></b></td>
            </tr>
        </tfoot>
    </table>
    <div class="col-lg-6">
        <div class="row">
            <div class="container">
                <div class="col-md-8">


                    <p class="right">Jambi, {{$tgl}}</p>


                    <p class="right">ttd</p>


                    <p class="right">Petugas</p>

                </div>
            </div>
        </div>
    </div>

</body>

</html>