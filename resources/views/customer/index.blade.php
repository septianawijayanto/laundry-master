@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('customer/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
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
                                <th>email</th>
                                <th>nama</th>
                                <th>no_hp</th>
                                <th>alamat</th>
                                <th>created at</th>
                                <th>update at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ url('customer/'.$dt->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <a href="{{ url('customer/'.$dt->id.'/delete') }}" class="btn btn-danger btn-xs btn-hapus" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="fa fa-trash-o"></i></a></div>
                                </td>
                                <td>{{$e+1}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->no_hp}}</td>
                                <td>{{$dt->alamat}}</td>
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