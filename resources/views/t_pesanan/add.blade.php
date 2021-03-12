@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('transaksi-pesanan') }}" class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>

                </p>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{ url('transaksi-pesanan/add') }}">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('customer_id') ? 'has-error' :''}}">
                        <label for="customer_id">Nama Customer</label>
                        <select name="customer_id" class="form-control" id="customer_id" require>
                            <option value="">-Pilih-</option>
                            @foreach($customer as $c)
                            <option value="{{$c->id}}">{{$c->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('customer_id'))
                        <span class="help-block">{{$errors->first('customer_id')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('paket_id') ? 'has-error' :''}}">
                        <label for="paket_id">Paket Laundry</label>
                        <select name="paket_id" class="form-control" id="paket_id" require>
                            <option value="">-Pilih-</option>
                            @foreach($paket as $c)
                            <option value="{{$c->id}}">{{$c->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('paket_id'))
                        <span class="help-block">{{$errors->first('paket_id')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('berat') ? 'has-error' :''}}">
                        <label for="exampleInputPassword1">Berat (KG)</label>
                        <input type="number" name="berat" class="form-control" id="exampleInputPassword1" placeholder="Berat">
                        @if($errors->has('berat'))
                        <span class="help-block">{{$errors->first('berat')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('status_pesanan_id') ? 'has-error' :''}}">
                        <label for="status_pesanan_id">Status Pesanan</label>
                        <select name="status_pesanan_id" class="form-control" id="status_pesanan_id" require>
                            <option value="">-Pilih-</option>
                            @foreach($status_pesanan as $c)
                            <option value="{{$c->id}}">{{$c->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_pesanan_id'))
                        <span class="help-block">{{$errors->first('status_pesanan_id')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('status_pembayaran_id') ? 'has-error' :''}}">
                        <label for="status_pembayaran_id">Status Pembayaran</label>
                        <select name="status_pembayaran_id" class="form-control" id="status_pembayaran_id" require>
                            <option value="">-Pilih-</option>
                            @foreach($status_pembayaran as $c)
                            <option value="{{$c->id}}">{{$c->id}}/{{$c->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_pembayaran_id'))
                        <span class="help-block">{{$errors->first('status_pembayaran_id')}}</span>
                        @endif
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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

    })
</script>

@endsection