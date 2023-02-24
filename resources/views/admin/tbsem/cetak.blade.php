<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nilai Mid Semester</title>
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
  <p style="text-align: center; font-size:x-large; font:bold;"><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b><br>SMPIT Future Islamic School</p><hr>@foreach ($semester2 as $semester )@endforeach

  <div class="card col-2">
    <div class="col-12">
        <p>Nama : {{ $siswa->nama }}</p>
        <p>kelas : {{ $siswa->kelas->kelas }}</p>
        <p>NIS  : {{ $siswa->nis }}</p>
        <p>Tahun Ajaran : {{ $semester->tahun_ajar }}</p>
        <p>Semester : {{ $semester->semester }}</p>
    </div>
  </div><hr>

  <b>A. SIKAP</b>
  <div class="row">
        <div class="col-12">
        <table class="table table-bordered">
        <thead class="table-warning">
            <tr>
                <th colspan="2"style="text-align: center">DESKRIPSI PENILAIAN SIKAP</th>
            </tr>
            <tr>
                <th>SIKAP SPIRITUAL</th>
                <th>SIKAP SOSIAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $siswa->spiritual }}</td>
                <td>{{ $siswa->sosial }}</td>
            </tr>
        </tbody>
        </table>
    </div>
  </div><br>

  <b>B. PENGETAHUAN DAN KETERAMPILAN</b>
  <div class="row">
    <div class="col-12">
    <table class="table table-bordered">
        <thead class="table-warning">
        <tr>
            <th rowspan="2" style="text-align: center">No</th>
            <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
            <th colspan="3" style="text-align: center">Pengetahuan</th>
            <th colspan="3" style="text-align: center">Keterampilan</th>
            @if (auth()->user()->role == 'Guru')
            <th rowspan="2" style="text-align: center">Nilai Akhir</th>
            @endif
        </tr>
        <tr>
            <th style="text-align: center">Angka</th>
            <th style="text-align: center">Predikat</th>
            <th style="text-align: center">Deksripsi</th>
            <th style="text-align: center">Angka</th>
            <th style="text-align: center">Predikat</th>
            <th style="text-align: center">Deksripsi</th>
        </tr>
        </thead>
        @foreach ($siswa->mapel2 as $mapel )
        @php
            $jumlah = $mapel->pivot->pa + $mapel->pivot->ka;
            $na = $jumlah/2;
        @endphp
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $mapel->kode_mapel }} - {{ $mapel->kd_singkat }}</td>
            <td style="text-align: center">{{ $mapel->pivot->pa }}</td>
            <td style="text-align: center">@php
            $nilai1 = $mapel->pivot->pa;
            if ($nilai1 == "") {
                echo "";
            } else if ($nilai1 >= 0 && $nilai1 <= 74) {
                echo 'D';
            } else if ($nilai1 >= 75 && $nilai1 <= 82) {
                echo 'C';
            } else if ($nilai1 >= 83 && $nilai1 <= 90) {
                echo 'B';
            } else if ($nilai1 >= 91 && $nilai1 <= 100) {
                echo 'A';
            }
            @endphp</td>
            <td style="text-align: justify">{{ $mapel->pivot->dp }}</td>
            <td style="text-align: center">{{ $mapel->pivot->ka }}</td>
            <td style="text-align: center">@php
            $nilai2 = $mapel->pivot->ka;
            if ($nilai2 == "") {
                echo "";
            } else if ($nilai2 >= 0 && $nilai2 <= 74) {
                echo 'D';
            } else if ($nilai2 >= 75 && $nilai2 <= 82) {
                echo 'C';
            } else if ($nilai2 >= 83 && $nilai2 <= 90) {
                echo 'B';
            } else if ($nilai2 >= 91 && $nilai2 <= 100) {
                echo 'A';
            }
        @endphp</td>
            <td style="text-align: justify">{{ $mapel->pivot->dk }}</td>
            <td>{{ $na }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
  </div><br>

<b>C. KETIDAK HADIRAN</b>
<div class="row">
  <div class="col-3">
        <table class="table table-bordered">
        <thead class="table-warning">
            <tr>
                <th colspan="3"style="text-align: center">JENIS ABSENSI</th>
            </tr>
            <tr>
                <th style="text-align: center">IZIN</th>
                <th style="text-align: center">SAKIT</th>
                <th style="text-align: center">ALPHA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">{{ $siswa->izin }}</td>
                <td style="text-align: center">{{ $siswa->sakit }}</td>
                <td style="text-align: center">{{ $siswa->alpha }}</td>
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
