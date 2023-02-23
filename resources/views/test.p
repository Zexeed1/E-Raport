@extends('template.LTE')

@section('content')
@include('template.preloader')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="col-11"><a href="{{ route('siswa') }}" class="btn btn-warning float-right"><i class="fa fa-reply" aria-hidden="true"></i> Isi Data Siswa </a></div><br><br>
        </div>
    </div>
</div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-1">

            <!-- Profile Image -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-10">
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
                    <table class="table table-bordered" id="tb">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th style="text-align: center">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa1 as $murid )
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $murid->nama }}</td>
                                        <td>{{ $murid->kelas->kelas }}</td>
                                        <td style="text-align: center">
                                            <a href="/nilai/berinilai/{{ $murid->id }}" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                            <a href="#" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div><!-- /.kelas 7 -->

                  <div class="tab-pane" id="kelas8">
                    <table class="table table-bordered" id="tb">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa2 as $murid )
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $murid->nama }}</td>
                                    <td>{{ $murid->kelas->kelas }}</td>
                                    <td style="text-align: center">
                                        <a href="/nilai/berinilai/{{ $murid->id }}" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                        <a href="#" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.kelas 8 -->

                  <div class="tab-pane" id="kelas9">
                    <table class="table table-bordered" id="tb">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="text-align: center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa3 as $murid )
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $murid->nama }}</td>
                                    <td>{{ $murid->kelas->kelas }}</td>
                                    <td style="text-align: center">
                                        <a href="/nilai/berinilai/{{ $murid->id }}" type="button" class="btn btn-primary btn-sm">Beri Nilai</a>
                                        <a href="#" type="button" class="btn btn-info btn-sm">Lihat Nilai</a>
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
