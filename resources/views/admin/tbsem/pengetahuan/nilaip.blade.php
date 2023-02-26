@extends('template.LTE')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-light">
              <h4><i class="fa fa-bookmark" aria-hidden="true"></i> Halaman Penilaian Pengetahuan</h4>
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
                 @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                 @endif
                <table class="table table-bordered">
                    <thead class="table-info">
                    <tr>
                      <th rowspan="2" style="text-align: center">No</th>
                      <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
                      <th colspan="2" style="text-align: center">Tes Tertulis</th>
                      <th rowspan="2" style="text-align: center"><u>Rerata TT</u></th>
                      <th colspan="4" style="text-align: center">Tugas/PR</th>
                      <th rowspan="2" style="text-align: center"><u>Rerata Tugas</u></th>
                      <th rowspan="2" style="text-align: center">UTS</th>
                      <th rowspan="2" style="text-align: center">UAS</th>
                      <th colspan="2" style="text-align: center">Hasil Penilaian Akhir</th>
                      <th rowspan="2" style="text-align: center"><u>Ket(T/TT)</u></th>
                      <th rowspan="2" style="text-align: center">Deskripsi</th>
                      @if (auth()->user()->role == 'Guru')
                      <th rowspan="2" style="text-align: center">Tool</th>
                      @endif
                    </tr>
                    <tr>
                        <th style="text-align: center">TT1</th>
                        <th style="text-align: center">TT2</th>
                        <th style="text-align: center">T1</th>
                        <th style="text-align: center">T2</th>
                        <th style="text-align: center">T3</th>
                        <th style="text-align: center">T4</th>
                        <th style="text-align: center"><u>Angka</u></th>
                        <th style="text-align: center"><u>Predikat</u></th>
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
                      <td style="text-align: center">{{ $mapel->kd_singkat }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->uh1 }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->uh2 }}</td>
                      <td style="text-align: center">{{ round($average) }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->t1 }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->t2 }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->t3 }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->t4 }}</td>
                      <td style="text-align: center">{{ round($average2) }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->uts }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->uas }}</td>
                      <td style="text-align: center"><b>{{ round($nilai_akhir) }}</b></td>
                      <td style="text-align: center"><b>@php
                        $nilai1 = $nilai_akhir;
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
                        if($ket >= 74){
                            echo "T";
                        } else{
                            echo "TT";
                        }
                      @endphp</td>
                      <td style="text-align: justify">{{ $mapel->pivot->desk_p }}</td>
                      @if (auth()->user()->role == 'Guru')
                      <td>
                         <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{ $mapel->id }}">Edit Nilai</a>
                      </td>
                      @endif
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
                Note :<br>
                T = Tercapai<br>
                TT = Tidak Tercapai<br>
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


<!-- Modal --->
<div class="modal" id="Input" tabindex="-1" role="dialog" aria-labelledby="InputLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InputLabel">Isi Nilai Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="/nilai-pengetahuan/{{ $siswa->id }}/insert" method="POST">
          @csrf
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
                              <h1 class="card-title"><b>Tugas/PR</b></h1>
                              <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="uts">T1</label>
                            <input type="number" class="form-control" name="t1" placeholder="Masukkan Nilai">
                          </div>
                          <div class="form-group">
                            <label for="uts">T2</label>
                            <input type="number" class="form-control" name="t2" placeholder="Masukkan Nilai">
                          </div>
                          <div class="form-group">
                            <label for="uts">T3</label>
                            <input type="number" class="form-control" name="t3" placeholder="Masukkan Nilai">
                          </div>
                          <div class="form-group">
                            <label for="uts">T4</label>
                            <input type="number" class="form-control" name="t4" placeholder="Masukkan Nilai">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option selected disabled>Pilih Mata Pelajaran</option>
                          @foreach ($matapelajaran as $matapelajaran)
                          <option value="{{ $matapelajaran->id }}">{{ $matapelajaran->mapel }} ({{ $matapelajaran->kd_singkat }})</option>
                          @endforeach
                        </select>(Pilih Mata Pelajaran yang belum di nilai)
                      </div>
                    <div class="card">
                      <div class="card-body">
                        <div class="card-header">
                          <h1 class="card-title"><b>Tes Tertulis</b></h1>
                            <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="ulangan">TT1</label>
                        <input type="number" class="form-control" name="uh1" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="uts">TT2</label>
                        <input type="number" class="form-control" name="uh2" placeholder="Masukkan Nilai">
                      </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="uts">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="uas">Nilai UAS</label>
                        <input type="number" class="form-control" name="uas" placeholder="Masukkan Nilai">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="desk_p">Deskripsi</label>
                    <textarea class="form-control"  style="height: 100;" name="desk_p" placeholder="Masukkan Deskripsi"></textarea>
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
        <form action="/nilai-pengetahuan/{{ $siswa->id }}/update" method="POST">
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
                              <h1 class="card-title"><b>Tugas/PR</b></h1>
                              <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="uts">T1</label>
                            <input type="number" class="form-control" name="t1" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->t1 }}">
                          </div>
                          <div class="form-group">
                            <label for="uts">T2</label>
                            <input type="number" class="form-control" name="t2" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->t2 }}">
                          </div>
                          <div class="form-group">
                            <label for="uts">T3</label>
                            <input type="number" class="form-control" name="t3" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->t3 }}">
                          </div>
                          <div class="form-group">
                            <label for="uts">T4</label>
                            <input type="number" class="form-control" name="t4" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->t4 }}">
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
                          <h1 class="card-title"><b>Tes Tertulis</b></h1>
                            <div class="card-tools">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="ulangan">TT1</label>
                        <input type="number" class="form-control" name="uh1" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->uh1 }}">
                      </div>
                      <div class="form-group">
                        <label for="uts">TT2</label>
                        <input type="number" class="form-control" name="uh2" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->uh2 }}">
                      </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="uts">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->uts }}">
                      </div>
                      <div class="form-group">
                        <label for="uas">Nilai UAS</label>
                        <input type="number" class="form-control" name="uas" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->uas }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="desk_p">Deskripsi</label>
                    <textarea class="form-control"  style="height: 100;" name="desk_p" placeholder="Masukkan Deskripsi">{{ $mapel->pivot->desk_p }}</textarea>
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
