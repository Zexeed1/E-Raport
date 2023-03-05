<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Raport Mid Semester</title>
    <link href="/images/logo-kecil.png" rel="shortcut icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fa/css/font-awesome.min.css') }}">
</head>
<body>
<section class="content">
      <div class="container-fluid">
  <img class="float-left" src="/images/logo-fis.png" width="150" height="80">
  <p style="text-align: center; font-size:x-large; font:bold;"><b>Future Islamic School</b><br>Nilai Raport mid</p><hr>
  <p>Nama : {{ $siswa->nama }}</p>
  <p>NIS  : {{ $siswa->nis }}</p>

  <div class="row">
    <div class="col-12">
  KKM : 75 <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th rowspan="2">Mata Pelajaran</th>
            <th colspan="3" style="text-align: center">Nilai Mata Pelajaran</th>
        </tr>
        <tr>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($siswa->mapel as $mapel)
          @php
            $total = 0;
            $jumlah = $mapel->pivot->kuis + $mapel->pivot->ulangan + $mapel->pivot->uts + $mapel->pivot->performance + $mapel->pivot->project + $mapel->pivot->product + $mapel->pivot->sikap;

            $subtotal = $jumlah/7;
            $total = $subtotal * 10;
            $rata = $total/10;
          @endphp
        <tr>
            <td>{{ $mapel->kode_mapel }} - {{ $mapel->mapel }}({{ $mapel->kd_singkat }})</td>
            <td>{{ round($subtotal) }}</td>
            <td>@php
                $nilai1 = $subtotal;
                if ($nilai1 == "") {
                    echo "";
                } else if ($nilai1 >= 0 && $nilai1 <= 75) {
                    echo 'D';
                } else if ($nilai1 >= 75 && $nilai1 <= 82) {
                    echo 'C';
                } else if ($nilai1 >= 82 && $nilai1 <= 89) {
                    echo 'B';
                } else if ($nilai1 >= 89 && $nilai1 <= 100) {
                    echo 'A';
                }
            @endphp</td>
            <td style="text-align: justify">@php
                $deskripsi = $subtotal;
                if($deskripsi >= 75){
                    echo "Target nilai tercapai";
                } else{
                    echo "Target nilai tidak tercapai";
                }
            @endphp</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="1"><b>Total</b></th>
            <td colspan="3">{{ round($total) }}</td>
        </tr>
        <tr>
        </tr>
        </tbody>
    </table>
    </div>
  </div>
<div class="box float-right">
    <p style="text-align: center">Pekanbaru, <span id="tanggalwaktu"></p>
    <div style="text-align: center">
        <p>Kepala Sekolah SMPIT FIS</p>
        <br><br><br><br>
        <p>Rahmansyah M.Pdi</p>
    </div>
  </div>
</div>
</section>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
    var dt = new Date();
    document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
    </script>
	<script>
		window.print();
	</script>
  </body>
</html>
