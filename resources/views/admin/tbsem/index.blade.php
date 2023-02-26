@extends('template.LTE')
@section('header')
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop
@section('content')
@include('template.preloader')

@if (auth()->user()->role == 'Siswa')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-tittle">
          <div class="card-header p-2">
            <div class="card-body">
              <form action="#" id="#">
                <div class="form-group">
                <label for="inputStatus">Pilih Semester</label>
                  <select id="inputStatus" class="form-control custom-select" name="mapel_id">
                    <option selected disabled>Pilih Semester yang akan di nilai</option>
                    @foreach ($semester as $lokal)
                    <a href="{{ route('mid') }}"><option value="{{ $lokal->id }}">{{ $lokal->semester }}</option></a>
                    @endforeach
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-md-12">
    <div class="col-12">
     <div class="card bg-info">
      <div class="card-body">
        <h4><i class="fa fa-leanpub" aria-hidden="true"></i> Raport Semester</h4>
      </div>
     </div>
    </div>
  </div>
</div>

<!-- content --->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kelas7" data-toggle="tab">Kelas 7</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelas8" data-toggle="tab">Kelas 8</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelas9" data-toggle="tab">Kelas 9</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="kelas7">
                     <div class="row no-print ">
                        <div class="col-12">
                        <a href="#" rel="noopener" target="_blank" class="btn btn-default float-lg-right"><i class="fas fa-print"></i> Cetak ledger nilai semester</a>
                        </div>
                    </div>
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->kelas->kelas }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Admin')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 7 -->

                  <div class="tab-pane" id="kelas8">
                    <div class="row no-print ">
                        <div class="col-12">
                        <a href="#" rel="noopener" target="_blank" class="btn btn-default float-lg-right"><i class="fas fa-print"></i> Cetak ledger nilai semester</a>
                        </div>
                    </div>
                   <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa1 as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->kelas->kelas }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Admin')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 8 -->

                  <div class="tab-pane" id="kelas9">
                    <div class="row no-print ">
                        <div class="col-12">
                        <a href="#" rel="noopener" target="_blank" class="btn btn-default float-lg-right"><i class="fas fa-print"></i>  Cetak ledger nilai semester</a>
                        </div>
                    </div>
                    <table class="table table-bordered" id="example3">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa2 as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->kelas->kelas }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Admin')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai-semester/{{ $mat->id }}/look" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 9   -->
                </div><!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('script')
    <script>
    $(function () {
        $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });

        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });

        $('#example3').DataTable({
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

