@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('status-pembayaran') }}" class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{ url('status-pembayaran/'.$dt->id) }}">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="box-body">

                        <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                            <label for="exampleInputEmail1">Nama Status</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$dt->nama}}">
                            @if($errors->has('nama'))
                            <span class="help-block">{{$errors->first('nama')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('urutan') ? 'has-error' :''}}">
                            <label for="exampleInputEmail1">Urutan</label>
                            <input type="text" name="urutan" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$dt->urutan}}">
                            @if($errors->has('urutan'))
                            <span class="help-block">{{$errors->first('urutan')}}</span>
                            @endif
                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">update</button>
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