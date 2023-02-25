@extends('template.LTE')
@section('header')
 <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop
@section('content')
@include('template.preloader')<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    @if(auth()->user()->role == 'Admin')
    <div class="col-12"><a href="{{ route('siswa') }}" class="btn btn-warning float-right"><i class="fa fa-reply" aria-hidden="true"></i> Isi Data Siswa </a></div><br><br>
    @endif
    @if(auth()->user()->role == 'Guru')
    <div class="col-12"><a href="https://wa.me/081371929161" class="btn btn-warning float-right"><i class="fa fa-reply" aria-hidden="true"></i> Hubungi Admin Untuk Mengisi Data Siswa </a></div><br><br>
    @endif
  </div>
</div><br>
<!-- content --->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kelas7" data-toggle="tab">Nilai Pengetahuan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Pilih Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $mapel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mapel->mapel }}</td>
                                <td style="text-align:center">
                                    <a href="/nilai-semester/{{ $mapel->id }}/kelas-7" class="btn btn-success"> Kelas 7 </a>
                                    <a href="/nilai-semester/{{ $mapel->id }}/kelas-8" class="btn btn-info"> Kelas 8 </a>
                                    <a href="/nilai-semester/{{ $mapel->id }}/kelas-9" class="btn btn-primary"> Kelas 9 </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 7 -->
                </div><!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
@section('script')
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
@stop

