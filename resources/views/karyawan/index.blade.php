@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('karyawan/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
                </p>
                </p>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Photo Profil</th>
                                <th>Created at</th>
                                <th>Update at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ url('karyawan/'.$dt->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <a href="{{ url('karyawan/'.$dt->id.'/delete') }}" class="btn btn-danger btn-xs btn-hapus" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                                <td>{{$e+1}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->username}}</td>
                                <td><a href="{{$dt->getAvatar()}}"> <img height="70px" width=" 50px" class="" src="{{$dt->getAvatar()}}" alt="Photo"></td>

                                <td>{{date('d F Y H:i:s',strtotime($dt->created_at)) }}</td>
                                <td>{{date('d F Y H:i:s',strtotime($dt->updated_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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