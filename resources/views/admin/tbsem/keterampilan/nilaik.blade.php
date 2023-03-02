@extends('template.LTE')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-light">
              <h4><i class="fa fa-bookmark" aria-hidden="true"></i> Halaman Penilaian Keterampilan</h4>
              SMPIT Future Islamic School
              <small class="float-right"><span id="tanggalwaktu"></span></small>
            </div>
 <!-- Main content -->

            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-book" aria-hidden="true"></i> Data Mata Pelajaran
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                  <address>
                    @foreach ($semester as $semester)@endforeach
                    Nama Peserta Didik : {{ $siswa->nama }}<br>
                    Kelas/Semester : {{ $siswa->kelas->kelas }} / {{ $semester->semester }} <br>
                    Tahun Ajaran : {{ $semester->tahun_ajar }}
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
                 @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                 @endif
                <table class="table table-bordered table-striped">
                    <thead class="table-danger">
                    <tr>
                      <th rowspan="2" style="text-align: center">No</th>
                      <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
                      <th colspan="2" style="text-align: center">Kinerja</th>
                      <th rowspan="2" style="text-align: center"><u>Rerata Kinerja</u></th>
                      <th colspan="2" style="text-align: center">Proyek</th>
                      <th rowspan="2" style="text-align: center"><u>Rerata Proyek</u></th>
                      <th colspan="2" style="text-align: center">Hasil Penilaian Akhir</th>
                      <th rowspan="2" style="text-align: center"><u>Ket(T/TT)</u></th>
                      <th rowspan="2" style="text-align: center">Deskripsi</th>
                      @if (auth()->user()->role == 'Guru')
                      <th rowspan="2" style="text-align: center">Tool</th>
                      @endif
                    </tr>
                    <tr>
                        <th style="text-align: center">Proses</th>
                        <th style="text-align: center">Product</th>
                        <th style="text-align: center">P1</th>
                        <th style="text-align: center">P2</th>
                        <th style="text-align: center"><u>Angka</u></th>
                        <th style="text-align: center"><u>Predikat</u></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($siswa->mapel2 as $mapel )
                    @php
                        $sum = $mapel->pivot->proses + $mapel->pivot->produk;
                        $average = $sum/2;

                        $sum2 = $mapel->pivot->pro1 + $mapel->pivot->pro2;
                        $average2 =$sum2/2;
                        $nilai_akhir = $average+$average2;
                        $nilai = $nilai_akhir/2;

                    @endphp
                    <tr>
                      <td style="text-align: center">{{ $loop->iteration }}</td>
                      <td style="text-align: center">{{ $mapel->kd_singkat }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->proses }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->produk }}</td>
                      <td style="text-align: center">{{ round($average) }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->pro1 }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->pro2 }}</td>
                      <td style="text-align: center">{{ round($average2) }}</td>
                      <td style="text-align: center"><b>{{ round($nilai) }}</b></td>
                      <td style="text-align: center"><b>@php
                        $nilai1 = $nilai;
                        if ($nilai1 >= 0 && $nilai1 <= 74) {
                            echo 'D';
                        } else if ($nilai1 >= 74 && $nilai1 <= 82) {
                            echo 'C';
                        } else if ($nilai1 >= 82 && $nilai1 <= 90) {
                            echo 'B';
                        } else if ($nilai1 >= 90 && $nilai1 <= 100) {
                            echo 'A';
                        }
                        @endphp</b></td>
                      <td style="text-align: center">@php
                           $ket = $nilai_akhir;
                        if($ket >= 75){
                            echo "T";
                        } else{
                            echo "TT";
                        }
                      @endphp</td>
                      <td style="text-align: justify">{{ $mapel->pivot->desk_k }}</td>
                      @if (auth()->user()->role == 'Guru')
                      <td>
                         <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{ $mapel->id }}"><i class="fa fa-pencil"></i></a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<!-- Modal Edit -->
@foreach($siswa->mapel as $mapel)
<div class="modal fade" id="Update{{ $mapel->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/nilai-keterampilan/{{ $siswa->id }}/update" method="POST">
          @csrf
          @method('put')
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="siswa_id" Value="{{ $siswa->id }} - {{ $siswa->nama }}">(Jangan diganti, Jika ingin menilai siswa ini)
                      </div>
                      <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                              <h1 class="card-title"><b>Kinerja</b></h1>
                              <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="uts">Proses</label>
                            <input type="number" class="form-control" name="proses" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->proses }}">
                          </div>
                          <div class="form-group">
                            <label for="uts">Produk</label>
                            <input type="number" class="form-control" name="produk" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->produk }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option value="{{ $mapel->id }}">{{ $mapel->mapel }} ({{ $mapel->kd_singkat }})</option>
                        </select>(Pilih Mata Pelajaran yang belum di nilai)
                      </div>
                    <div class="card">
                      <div class="card-body">
                        <div class="card-header">
                          <h1 class="card-title"><b>Proyek</b></h1>
                            <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="ulangan">P1</label>
                        <input type="number" class="form-control" name="pro1" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->pro1 }}">
                      </div>
                      <div class="form-group">
                        <label for="uts">P2</label>
                        <input type="number" class="form-control" name="pro2" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->pro2 }}">
                      </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="desk_p">Deskripsi</label>
                    <textarea class="form-control"  style="height: 100;" name="desk_k" placeholder="Masukkan Deskripsi">{{ $mapel->pivot->desk_k }}</textarea>
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
