@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('laporan/laporanpdf') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-download"></i> Export PDF Today</a>
                    <a href="{{ url('laporan/laporanpdfall') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-download"></i> Export PDF All</a>

                </p>
            </div>
            <div class="box-body">
                <table class="table table-hover myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Paket</th>
                            <th>Status Pesanan</th>
                            <th>Status Pemabayaran</th>
                            <th>Berat</th>
                            <th>Grand Total</th>


                            <th>Created At</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e=>$dt)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$dt->customer->nama}}</td>
                            <td>{{$dt->paket->nama}}</td>
                            <td>{{$dt->status_pesanan->nama}}</td>
                            <td>{{$dt->status_pembayaran->nama}}</td>
                            <td>{{$dt->berat}} Kg</td>
                            <td>Rp.{{$dt->grand_total}}</td>

                            <td>{{ date('d F Y',strtotime($dt->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
        $('.btn-filter').click(function(e) {
            e.preventDefault();

            $('#modal-filter').modal();
        })

    })
</script>

@endsection