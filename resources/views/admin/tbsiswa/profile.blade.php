@extends('template.LTE')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="col-12"><a href="{{ route('siswa') }}" class="btn btn-warning"><i class="fa fa-reply" aria-hidden="true"></i>Kembali</a></div><br>
        </div>
    </div>
</div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class=" img-circle" src="{{ asset('images/'.$siswa->avatar) }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $siswa->nama }}</h3>

                <p class="text-muted text-center">Siswa</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIS</b> <a class="float-right">{{ $siswa->nis }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Kelas</b> <a class="float-right">{{ $siswa->kelas->kelas }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Agama</b> <a class="float-right">{{ $siswa->agama }}</a>
                  </li>
                </ul>
            @if (auth()->user()->role == 'Admin')
            <a href="/siswa/edit/{{ $siswa->id }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Nilai Mid</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Nilai Semester</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Rekap Nilai</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div id="chartNilai"></div>
                    <a href="/nilai/{{ $siswa->id }}/cetak" class="btn btn-success btn-block">Cetak Nilai Mid</a>
                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div id="chartNilai1"></div>
                    <a href="#" class="btn btn-success btn-block">Cetak Nilai semester</a>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">


                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Nilai UTS'
            },

            xAxis: {
                categories: {!! json_encode($categories) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:1">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 2
                }
            },
            series: [{
                name: 'Nilai yang diraih',
                data: {!! json_encode($data) !!}
            }]
        });
    </script>
    <script>
        Highcharts.chart('chartNilai1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Nilai UAS'
            },

            xAxis: {
                categories: {!! json_encode($categories) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:1">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 2
                }
            },
            series: [{
                name: 'Nilai yang diraih',
                data: {!! json_encode($dataa) !!}
            }]
        });
    </script>
@stop
