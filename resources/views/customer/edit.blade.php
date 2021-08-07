@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('customer') }}" class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <form role="form" method="post" action="{{ url('customer/'.$dt->id) }}">
                    {{csrf_field()}}
                    {{ method_field ('PUT') }}
                    <div class="box-body">
                        <div class="form-group {{$errors->has('email') ? 'has-error' :''}}">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $dt->email }}">
                            @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama" value="{{ $dt->nama }}">
                            @if($errors->has('nama'))
                            <span class="help-block">{{$errors->first('nama')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('no_hp') ? 'has-error' :''}}">
                            <label for="exampleInputPassword1">No Hp</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="No hp" value="{{ $dt->no_hp }}">
                            @if($errors->has('no_hp'))
                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="5">{{ $dt->alamat }}</textarea>
                            @if($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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