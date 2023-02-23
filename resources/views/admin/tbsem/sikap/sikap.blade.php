@extends('template.LTE')
@section('header')
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop
@section('content')
@include('template.preloader')
<div class="row">
  <div class="col-md-12">
    <div class="col-12">
     <div class="card bg-success">
      <div class="card-body">
        <h4><i class="fa fa-book" aria-hidden="true"></i> Nilai Sikap dan Absesnsi</h4>
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
                                <th rowspan="2">#</th>
                                <th rowspan="2"style="text-align: center">NAMA</th>
                                <th colspan="2"style="text-align: center">DESKRIPSI PENILAIAN SIKAP</th>
                                <th rowspan="2"style="text-align: center">NIS</th>
                                <th colspan="3"style="text-align: center">KEHADIRAN</th>
                                <th rowspan="2"style="text-align: center">Tools</th>
                            </tr>
                            <tr>
                                <th>SIKAP SPIRITUAL</th>
                                <th>SIKAP SOSIAL</th>
                                <th>IZIN</th>
                                <th>SAKIT</th>
                                <th>ALPHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->spiritual }}</td>
                                <td>{{ $mat->sosial }}</td>
                                <td>{{ $mat->nis }}</td>
                                <td>{{ $mat->izin }}</td>
                                <td>{{ $mat->sakit }}</td>
                                <td>{{ $mat->alpha }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Update{{ $mat->id }}"><i class="fa fa-pencil"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    Note : Kosongkan Jika Tidak Perlu Di isi
                  </div><!-- /.kelas 7 -->

                  <div class="tab-pane" id="kelas8">
                   <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2"style="text-align: center">NAMA</th>
                                <th colspan="2"style="text-align: center">DESKRIPSI PENILAIAN SIKAP</th>
                                <th rowspan="2"style="text-align: center">NIS</th>
                                <th colspan="3"style="text-align: center">KEHADIRAN</th>
                                <th rowspan="2"style="text-align: center">Tools</th>
                            </tr>
                            <tr>
                                <th>SIKAP SPIRITUAL</th>
                                <th>SIKAP SOSIAL</th>
                                <th>IZIN</th>
                                <th>SAKIT</th>
                                <th>ALPHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa1 as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->spiritual }}</td>
                                <td>{{ $mat->sosial }}</td>
                                <td>{{ $mat->nis }}</td>
                                <td>{{ $mat->izin }}</td>
                                <td>{{ $mat->sakit }}</td>
                                <td>{{ $mat->alpha }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Update{{ $mat->id }}"><i class="fa fa-pencil"></i></a>
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
                                <th rowspan="2">#</th>
                                <th rowspan="2"style="text-align: center">NAMA</th>
                                <th colspan="2"style="text-align: center">DESKRIPSI PENILAIAN SIKAP</th>
                                <th rowspan="2"style="text-align: center">NIS</th>
                                <th colspan="3"style="text-align: center">KEHADIRAN</th>
                                <th rowspan="2"style="text-align: center">Tools</th>
                            </tr>
                            <tr>
                                <th>SIKAP SPIRITUAL</th>
                                <th>SIKAP SOSIAL</th>
                                <th>IZIN</th>
                                <th>SAKIT</th>
                                <th>ALPHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa2 as $mat )
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mat->nama }}</td>
                                <td>{{ $mat->spiritual }}</td>
                                <td>{{ $mat->sosial }}</td>
                                <td>{{ $mat->nis }}</td>
                                <td>{{ $mat->izin }}</td>
                                <td>{{ $mat->sakit }}</td>
                                <td>{{ $mat->alpha }}</td>
                                <td style="text-align: center">
                                    @if (auth()->user()->role == 'Guru')
                                    <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Update{{ $mat->id }}"><i class="fa fa-pencil"></i></a>
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

@foreach ($siswa as $siswa )
<!-- Modal -->
<div class="modal fade" id="Update{{ $siswa->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Nilai sikap dan absesnsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="/nilai-sikap/{{ $siswa->id }}/update" method="POST">
          @csrf
          @method('put')
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="uts">Deskripsi Spiritual</label>
                      <textarea type="text" class="form-control" name="spiritual" placeholder="Masukkan Deskripsi Sikap Spiritual" style="height: 100;">{{ $siswa->spiritual }}</textarea>
                    </div>
                      <div class="form-group">
                        <label for="sikap">Deskripsi Sosial</label>
                        <textarea class="form-control"  style="height: 50;" name="sosial" placeholder="Masukkan Deskripsi Sikap Sosial">{{ $siswa->sosial }}</textarea>
                    </div>

                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label for="ulangan">Izin</label>
                        <input type="number" class="form-control" name="izin" placeholder="Masukkan Absensi" value="{{ $siswa->izin }}">
                      </div>
                    <div class="form-group">
                        <label for="performance">Sakit</label>
                        <input type="number"  class="form-control" name="sakit" placeholder="Masukkan Absensi" value="{{ $siswa->sakit }}">
                    </div>
                    <div class="form-group">
                        <label for="performance">Alpha</label>
                        <input type="number"  class="form-control" name="alpha" placeholder="Masukkan Absensi" value="{{ $siswa->alpha }}">
                    </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <div class="col-12">
                   <a  class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                   <button type="submit" class="btn btn-success float-right">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form><!-- /.form --->
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($siswa1 as $siswa )
<!-- Modal -->
<div class="modal fade" id="Update{{ $siswa->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Nilai sikap dan absesnsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="/nilai-sikap/{{ $siswa->id }}/update" method="POST">
          @csrf
          @method('put')
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="uts">Deskripsi Spiritual</label>
                      <textarea type="text" class="form-control" name="spiritual" placeholder="Masukkan Deskripsi Sikap Spiritual" style="height: 100;">{{ $siswa->spiritual }}</textarea>
                    </div>
                      <div class="form-group">
                        <label for="sikap">Deskripsi Sosial</label>
                        <textarea class="form-control"  style="height: 50;" name="sosial" placeholder="Masukkan Deskripsi Sikap Sosial">{{ $siswa->sosial }}</textarea>
                    </div>

                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label for="ulangan">Izin</label>
                        <input type="number" class="form-control" name="izin" placeholder="Masukkan Absensi" value="{{ $siswa->izin }}">
                      </div>
                    <div class="form-group">
                        <label for="performance">Sakit</label>
                        <input type="number"  class="form-control" name="sakit" placeholder="Masukkan Absensi" value="{{ $siswa->sakit }}">
                    </div>
                    <div class="form-group">
                        <label for="performance">Alpha</label>
                        <input type="number"  class="form-control" name="alpha" placeholder="Masukkan Absensi" value="{{ $siswa->alpha }}">
                    </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <div class="col-12">
                   <a  class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                   <button type="submit" class="btn btn-success float-right">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </form><!-- /.form --->
      </div>
    </div>
  </div>
</div>
@endforeach

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

