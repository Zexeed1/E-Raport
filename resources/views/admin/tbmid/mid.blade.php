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
  </div>
</div><br>
<div class="row">
  <div class="col-md-12">
    <div class="col-12">
     <div class="card bg-gray">
      <div class="card-body">
        <h4><i class="fa fa-book" aria-hidden="true"></i> MID Semester</h4>
      </div>
     </div>
    </div>
  </div>
</div>

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
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Beri Nilai</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 7 -->

                  <div class="tab-pane" id="kelas8">
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
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Beri Nilai</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 8 -->

                  <div class="tab-pane" id="kelas9">
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
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    @endif
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="/nilai/{{ $mat->id }}/lihat" type="button" class="btn btn-info btn-sm">Beri Nilai</a>
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
  </div>
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

