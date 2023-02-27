@extends('template.LTE')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-warning">
              <h4><i class="fa fa-university" aria-hidden="true"></i> Halaman Raport Semester</h4>
              Masukkan Nilai yang sesuai!!
              <small class="float-right"><span id="tanggalwaktu"></span></small>
            </div>
 <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> Data Siswa
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                  <address>
                    Nama      : {{ $siswa->nama }}<br>
                    Kelas : {{ $siswa->kelas->kelas }} <br>
                     <br>
                    <br>
                  </address>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-2">
                  <p class="text-muted well well-lg shadow-sm" style="margin-top: 10px;">
                    Note Guru : <br>
                    KKM = 75 *
                  </p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                 @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                 @endif
                 @if (session('berhasil'))
                    <div class="alert alert-info" role="alert">
                        {{ session('berhasil') }}
                    </div>
                 @endif
                <table class="table table-bordered">
                    <thead class="table-warning">
                    <tr>
                      <th rowspan="2" style="text-align: center">No</th>
                      <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
                      <th colspan="3" style="text-align: center">Pengetahuan</th>
                      <th colspan="3" style="text-align: center">Keterampilan</th>
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
                      <td>{{ $mapel->kode_mapel }} - {{ $mapel->kd_singkat }}</td>
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
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->



              <!-- this row will not appear when printing -->
              <div class="row no-print ">
                <div class="col-12">
                  <a href="/nilai-semester/{{ $siswa->id }}/cetak" rel="noopener" target="_blank" class="btn btn-default float-lg-right"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
  </div>



@stop

@section('script')
    <script> <!-- Script Tanggal--->
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
    </script><!-- /.Script Tanggal--->

@stop

@section('sideContent')
    <p class="p-3">Note by Developer:</p><br>
    <p class="p-3">Semangat Ya orang Hebat!!</p>

@stop
