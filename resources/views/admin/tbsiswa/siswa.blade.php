@extends('template.LTE')
@section('header')
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop
@section('content')
@include('template.preloader')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Data Siswa</h1>
                        <div class="card-tools">
                            @if (auth()->user()->role == 'Admin')
                            <a href="{{ route('addSiswa') }}" type="button" class="btn btn-tool"><i class="fas fa-plus fa-lg"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('update'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('update') }}
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif
                        @if (session('sukses'))
                            <div class="alert alert-info" role="alert">
                                {{ session('sukses') }}
                            </div>
                        @endif
                        <table class="table table-striped" id="example1">
                            <thead>
                                <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Foto Siswa</th>
                                <th style="text-align: center">Nama Siswa</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">NIS</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Kelas</th>
                                <th style="text-align: center">Agama</th>
                                <th style="text-align: center">Alamat</th>

                                <th style="text-align: center">Tools</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $murid )
                                    <tr>
                                        <th style="text-align: center">{{ $loop->iteration }}</th>
                                        <td style="text-align: center"><img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$murid->avatar) }}" alt="User profile picture"></td>
                                        <td style="text-align: center">{{ $murid->nama }}</td>
                                        <td style="text-align: center">{{ $murid->email }}</td>
                                        <td style="text-align: center">{{ $murid->nis }}</td>
                                        <td style="text-align: center">{{ $murid->jk }}</td>
                                        <td style="text-align: center">{{ $murid->kelas->kelas }}</td>
                                        <td style="text-align: center">{{ $murid->agama }}</td>
                                        <td style="text-align: center">{{ $murid->alamat }}</td>

                                        <td style="text-align: center">
                                            @if (auth()->user()->role == 'Guru')
                                            <a href="/siswa/profile/{{ $murid->id }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            @endif
                                            @if (auth()->user()->role == 'Admin')
                                            <a href="/siswa/edit/{{ $murid->id }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="/siswa/delete/{{ $murid->id }}" type="button" class="btn btn-danger btn-sm toastDafaultDanger"><i class="fas fa-trash"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
@stop
