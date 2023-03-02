<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nilai Semester</title>
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
  <p style="text-align: center; font-size:x-large; font:bold;"><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b><br>SMPIT Future Islamic School</p><hr>@foreach ($semester as $semester )@endforeach

<div class="card col-4">
  <div class="card-body">
    <div class="col-12">
        <p>Nama : {{ $siswa->nama }}</p>
        <p>kelas : {{ $siswa->kelas->kelas }}</p>
        <p>NIS  : {{ $siswa->nis }}</p>
        <p>Tahun Ajaran : {{ $semester->tahun_ajar }}</p>
        <p>Semester : {{ $semester->semester }}</p>
    </div>
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
                      <th rowspan="2" style="text-align: center">Nilai Akhir</th>
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
                    <tbody>
                    @foreach ($siswa->mapel2 as $mapel )
                    @php
                        $sum = $mapel->pivot->uh1 + $mapel->pivot->uh2;
                        $average = $sum/2;

                        $sum2 = $mapel->pivot->t1 + $mapel->pivot->t2 + $mapel->pivot->t3 + $mapel->pivot->t4;
                        $average2 =$sum2/4;

                        $hph = ($average*0.6) + ($average2*0.4);
                        $nilai_akhir = ((2*$hph)+$mapel->pivot->uts+$mapel->pivot->uas)/4;
                    @endphp

                    <tr>
                      <td style="text-align: center">{{ $loop->iteration }}</td>
                      <td>{{ $mapel->kode_mapel }} - {{ $mapel->mapel }} ({{ $mapel->kd_singkat }})</td>
                      <td style="text-align: center">{{ round($nilai_akhir)}}</td>
                      <td style="text-align: center">@php
                        $nilai1 = $nilai_akhir;
                        if ($nilai1 == "") {
                            echo "";
                        } else if ($nilai1 >= 0 && $nilai1 <= 74) {
                            echo 'D';
                        } else if ($nilai1 >= 74 && $nilai1 <= 82) {
                            echo 'C';
                        } else if ($nilai1 >= 82 && $nilai1 <= 90) {
                            echo 'B';
                        } else if ($nilai1 >= 90 && $nilai1 <= 100) {
                            echo 'A';
                        }
                        @endphp</td>
                      <td style="text-align: justify">{{ $mapel->pivot->desk_p }}</td>
                    @php
                        $sum1 = $mapel->pivot->proses + $mapel->pivot->produk;
                        $average3 = $sum1/2;

                        $sum3 = $mapel->pivot->pro1 + $mapel->pivot->pro2;
                        $average4 =$sum3/2;
                        $nilai_akhir1 = $average3+$average4;
                        $nilai = $nilai_akhir1/2;
                    @endphp
                      <td style="text-align: center">{{ round($nilai) }}</td>
                      <td style="text-align: center">@php
                        $nilai2 = $nilai;
                        if ($nilai2 == "") {
                            echo "";
                        } else if ($nilai2 >= 0 && $nilai2 <= 74) {
                            echo 'D';
                        } else if ($nilai2 >= 74 && $nilai2 <= 82) {
                            echo 'C';
                        } else if ($nilai2 >= 82 && $nilai2 <= 90) {
                            echo 'B';
                        } else if ($nilai2 >= 90 && $nilai2 <= 100) {
                            echo 'A';
                        }
                    @endphp</td>
                      <td style="text-align: justify">{{ $mapel->pivot->desk_k }}</td>
                    @php
                        $na = $nilai_akhir+$nilai;
                        $rata = $na/2;
                    @endphp
                      <td style="text-align: center"><b>{{ round($rata) }}</b></td>
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
    <p style="text-align: justify">Pekanbaru, <span id="tanggalwaktu"></p>
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
