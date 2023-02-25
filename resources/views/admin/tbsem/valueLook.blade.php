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
                    @if (auth()->user()->role == 'Guru')
                    <small class="float-right"><a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Input">Beri Nilai</a></small>
                    @endif
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
                {{-- <table class="table table-bordered">
                    <thead class="table-warning">
                    <tr>
                      <th rowspan="2" style="text-align: center">No</th>
                      <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
                      <th colspan="3" style="text-align: center">Pengetahuan</th>
                      <th colspan="3" style="text-align: center">Keterampilan</th>
                      @if (auth()->user()->role == 'Guru')
                      <th rowspan="2" style="text-align: center">Tool</th>
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
                    <tbody>
                    @foreach ($siswa->mapel2 as $mapel )
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
                      @if (auth()->user()->role == 'Guru')
                      <td>
                         <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{ $mapel->id }}">Edit Nilai</a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>  --}}

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


{{-- <!-- Modal --->
<div class="modal fade" id="Input" tabindex="-1" role="dialog" aria-labelledby="InputLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InputLabel">Isi Nilai Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="/nilai-semester/{{ $siswa->id }}/add" method="POST">
          @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{ $siswa->nama }} ID</label>
                        <input type="text" class="form-control" name="siswa_id" Value="{{ $siswa->id }}">
                      </div>
                      <div class="form-group">
                        <label for="ulangan">Nilai Pengetahuan</label>
                        <input type="number" class="form-control" name="pa" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="uts">Deskripsi</label>
                        <textarea type="text" class="form-control" name="dp" placeholder="Masukkan Deskripsi" style="height: 100;"></textarea>
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option selected disabled>Pilih Mata Pelajaran</option>
                          @foreach ($matapelajaran as $matapelajaran)
                          <option value="{{ $matapelajaran->id }}">{{ $matapelajaran->mapel }}({{ $matapelajaran->kd_singkat }})</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="performance">Nilai Keterampilan</label>
                        <input type="number"  class="form-control" name="ka" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="sikap">Deskripsi</label>
                        <textarea class="form-control"  style="height: 50;" name="dk" placeholder="Masukkan Deskripsi"></textarea>
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


<!-- Modal Edit -->
@foreach($siswa->mapel2 as $mapel)
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
      <form action="/nilai-semester/{{ $siswa->id }}/update" method="POST">
          @csrf
          @method('put')
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{ $siswa->nama }} ID</label>
                        <input type="text" class="form-control" name="siswa_id" Value="{{ $siswa->id }}">
                      </div>
                      <div class="form-group">
                        <label for="ulangan">Nilai Pengetahuan</label>
                        <input type="number" class="form-control" name="pa" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->pa }}">
                      </div>
                      <div class="form-group">
                        <label for="uts">Deskripsi</label>
                        <textarea type="text" class="form-control" name="dp" placeholder="Masukkan Deskripsi" style="height: 100;">{{ $mapel->pivot->dp }}</textarea>
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option value="{{ $mapel->id }}">{{ $mapel->mapel}}</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="performance">Nilai Keterampilan</label>
                        <input type="number"  class="form-control" name="ka" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->ka }}">
                      </div>
                      <div class="form-group">
                        <label for="sikap">Deskripsi</label>
                        <textarea class="form-control"  style="height: 50;" name="dk" placeholder="Masukkan Deskripsi">{{ $mapel->pivot->dk }}</textarea>
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
@endforeach --}}

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
