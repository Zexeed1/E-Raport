@extends('template.LTE')
@section('content')
@include('template.preloader')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills text-center">
                  <li class="nav-item"><a class="nav-link active" href="#kelas7" data-toggle="tab">Kelas 7</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelas8" data-toggle="tab">Kelas 8</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelas9" data-toggle="tab">Kelas 9</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="kelas7">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ranking siswa mid semester</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>700</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title">Ranking siswa semester Ganjil</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>800</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div><!-- /.card -->
                            </div>
                        </div>
                    </div>
                  </div><!-- /.kelas 7 -->

                  <div class="tab-pane" id="kelas8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                   <h3 class="card-title">Ranking siswa mid semester</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>600</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                   <h3 class="card-title">Ranking siswa semester Ganjil</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                   <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>600</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div><!-- /.card -->
                            </div>
                        </div>
                    </div>
                  </div><!-- /.kelas 8 -->

                  <div class="tab-pane" id="kelas9">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                   <h3 class="card-title">Ranking siswa mid semester</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>600</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header">
                                   <h3 class="card-title">Ranking siswa semester Ganjil</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Ranking</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><b>1</b></td>
                                        <td>Ahmad Nasution</td>
                                        <td>600</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div><!-- /.card -->
                            </div>
                        </div>
                    </div>
                  </div><!-- /.kelas 9   -->
                </div><!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@stop
