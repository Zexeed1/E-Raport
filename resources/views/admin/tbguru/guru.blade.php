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
                        <h1 class="card-title">Data Guru</h1>
                        <div class="card-tools">
                            <a href="{{ route('addGuru') }}" type="button" class="btn btn-tool"><i class="fas fa-plus fa-lg"></i></a>
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
                                <th style="text-align: center">Foto Guru</th>
                                <th style="text-align: center">Nama Guru</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">No.HP</th>
                                <th style="text-align: center">Mapel</th>
                                <th style="text-align: center">Agama</th>
                                <th style="text-align: center">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $guru )
                                    <tr>
                                        <th style="text-align: center">{{ $loop->iteration }}</th>
                                        <td style="text-align: center"><img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$guru->avatar) }}" alt="User profile picture"></td>
                                        <td style="text-align: center">{{ $guru->nama }}</td>
                                        <td style="text-align: center">{{ $guru->email }}</td>
                                        <td style="text-align: center">{{ $guru->jk }}</td>
                                        <td style="text-align: center">{{ $guru->nohp }}</td>
                                        <td style="text-align: center">{{ $guru->agama }}</td>
                                        <td style="text-align: center">{{ $guru->alamat }}</td>
                                        <td style="text-align: center">
                                            <a href="/guru/profile/{{ $guru->id }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="/guru/edit/{{ $guru->id }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal{{ $guru->id }}" type="button" class="btn btn-danger btn-sm toastDafaultDanger"><i class="fas fa-trash"></i></a>
                                        </td>
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

@foreach ($gurus as $guru )
<div class="modal fade" id="deleteModal{{ $guru->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus Data {{ $guru->nama }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/guru/delete/{{ $guru->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

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
