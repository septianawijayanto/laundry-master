@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('karyawan') }}" class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>

                </p>
            </div>
            <div class="box-body">

                <form action="{{ url('/karyawan/'.$dt->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field ('PUT') }}
                    <div class="form-group {{$errors->has('name') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama" value="{{ $dt->name }}">
                        @if($errors->has('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('username') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">UserName</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama" value="{{$dt->username}}">
                        @if($errors->has('username'))
                        <span class="help-block">{{$errors->first('username')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Input Email" value="{{ $dt->email }}">
                        @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('avatar') ? 'has-error' :''}}">
                        <label for=" exampleInputFile">Photo Profil</label>
                        <input type="file" name="avatar" class="form-control">
                        <p class="help-block"></p>
                        @if($errors->has('avatar'))
                        <span class="help-block">{{$errors->first('avatar')}}</span>
                        @endif
                    </div>

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