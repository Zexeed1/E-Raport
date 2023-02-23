@extends('template.LTE')

@section('content')
@include('template.preloader')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <h3><span id="tanggalwaktu"></span></h3>
        </div>
    </div>
</div><br>
@if (session('sukses'))
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        </div>
    </div>
</div>
@endif
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ Auth::user()->count() }}</h3>
          <p>Jumlah akun di aplikasi</p>
        </div>
        <div class="icon">
          <i class="fa fa-user" aria-hidden="true"></i>
        </div>
          <a href="#" class="small-box-footer"><i class="fas fa-user"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $siswa->count() }}</h3>
          <p>Jumlah Siswa</p>
        </div>
        <div class="icon">
          <i class="fa fa-graduation-cap" aria-hidden="true"></i>
        </div>
          <a href="#" class="small-box-footer"><i class="fas fa-graduation-cap"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-maroon">
        <div class="inner">
            <h3>{{ $guru->count() }}</h3>
            <p>Jumlah Guru</p>
        </div>
        <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fas fa-users"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{ $mapel->count() }}</h3>
            <p>Jumlah Mata Pelajaran</p>
        </div>
        <div class="icon">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
            <a href="#" class="small-box-footer"><i class="fas fa-book"></i></a>
        </div>
      </div>
    </div>
    <div id="container"></div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {

    title: {
        text: 'Jumlah Murid yang Mendaftar di Future Islamic School',
        align: 'center'
    },

    subtitle: {
        text: 'Source: <a href="https://futureislamicschoolpku.sch.id/" target="_blank">FIS Web</a>',
        align: 'center'
    },

    yAxis: {
        title: {
            text: 'Angka Jumlah'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2014 to 2023'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2014
        }
    },

    series: [{
        name: 'Total murid',
        data: [660, 720, 689, 702, 670, 705,
            698, 712, 740, 736]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
    </script>
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
        else (a=tw.getTime());
        tw.setTime(a);
        var tahun= tw.getFullYear ();
        var hari= tw.getDay ();
        var bulan= tw.getMonth ();
        var tanggal= tw.getDate ();
        var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
        var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
    </script>

@stop
