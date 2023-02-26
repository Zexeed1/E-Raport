@extends('template.LTE')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-success">
              <h4><i class="fa fa-university" aria-hidden="true"></i> Halaman Rapor Mid Semester</h4>
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
                      <th colspan="2" style="text-align: center">PP</th>
                      <th rowspan="2" style="text-align: center">Rt PP</th>
                      <th rowspan="2" style="text-align: center">UTS</th>
                      <th rowspan="2" style="text-align: center">NA</th>
                      <th rowspan="2" style="text-align: center">Perform</th>
                      <th rowspan="2" style="text-align: center">Project</th>
                      <th rowspan="2" style="text-align: center">Product</th>
                      <th rowspan="2" style="text-align: center">Sikap</th>
                      <th rowspan="2" style="text-align: center">Jumlah</th>
                      <th rowspan="2" style="text-align: center">Nilai Rapor</th>
                      @if (auth()->user()->role == 'Guru')
                      <th rowspan="2" style="text-align: center">Tool</th>
                      @endif
                    </tr>
                    <tr>
                        <th style="text-align: center">Kuis</th>
                        <th style="text-align: center">UH</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($siswa->mapel as $mapel )
                     @php
                    $jumlah = $mapel->pivot->kuis + $mapel->pivot->ulangan;
                    $rataRata = $jumlah/2;

                    $jumlah1 = $mapel->pivot->uts + $rataRata;
                    $na = $jumlah1/2
                    @endphp
                    @php
                    $jumlah2 = $mapel->pivot->kuis + $mapel->pivot->ulangan + $mapel->pivot->uts + $mapel->pivot->performance + $mapel->pivot->project + $mapel->pivot->product + $mapel->pivot->sikap;
                    $total = $jumlah2;

                    $jumlah3 = $mapel->pivot->kuis + $mapel->pivot->ulangan + $mapel->pivot->uts + $mapel->pivot->performance + $mapel->pivot->project + $mapel->pivot->product + $mapel->pivot->sikap;
                    $subtotal = $jumlah3/7;
                    @endphp
                    <tr>
                      <td style="text-align: center">{{ $loop->iteration }}</td>
                      <td>{{ $mapel->kode_mapel }} - {{ $mapel->kd_singkat }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->kuis }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->ulangan }}</td>
                      <td style="text-align: center">{{ $rataRata }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->uts }}</td>
                      <td style="text-align: center">{{ $na }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->performance }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->project }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->product }}</td>
                      <td style="text-align: center">{{ $mapel->pivot->sikap }}</td>
                      <td style="text-align: center">{{ $total }}</td>
                      <td style="text-align: center">{{ round($subtotal) }}</td>
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
                  <a href="/nilai/{{ $siswa->id }}/cetak" rel="noopener" target="_blank" class="btn btn-default float-lg-right"><i class="fas fa-print"></i> Cetak Raport Mid</a>
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
          <form action="/nilai/{{ $siswa->id }}/addNilai" method="POST">
          @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{ $siswa->nama }} ID</label>
                        <input type="text" class="form-control" name="siswa_id" Value="{{ $siswa->id }}">(Jangan diganti, Jika ingin menilai siswa ini)
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option selected disabled>Pilih Mata Pelajaran</option>
                          @foreach ($matapelajaran as $matapelajaran)
                          <option value="{{ $matapelajaran->id }}">{{ $matapelajaran->mapel }} ({{ $matapelajaran->kd_singkat }})</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Kuis</label>
                        <input type="number" class="form-control" name="kuis" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="ulangan">Ulangan Harian</label>
                        <input type="number" class="form-control" name="ulangan" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="uts">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" placeholder="Masukkan Nilai">
                   </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="performance">Nilai Performance</label>
                        <input type="number"  class="form-control" name="performance"placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="project">Nilai Project</label>
                        <input type="number" class="form-control" name="project" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="product">Nilai Product</label>
                        <input type="number" class="form-control" name="product" placeholder="Masukkan Nilai">
                      </div>
                      <div class="form-group">
                        <label for="sikap">Nilai Sikap</label>
                        <input type="number" class="form-control" name="sikap" placeholder="Masukkan Nilai">
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
        <form action="/nilai/{{ $siswa->id }}/updateNilai" method="POST">
          @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{ $siswa->nama }} ID</label>
                        <input type="text" class="form-control" name="siswa_id" Value="{{ $siswa->id }}">(Jangan diganti, Jika ingin menilai siswa ini)
                      </div>
                      <div class="form-group">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id">
                          <option value="{{ $mapel->id }}">{{ $mapel->mapel }} ({{ $mapel->kd_singkat }})</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Kuis</label>
                        <input type="number" class="form-control" name="kuis" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->kuis }}">
                      </div>
                      <div class="form-group">
                        <label for="ulangan">Ulangan Harian</label>
                        <input type="number" class="form-control" name="ulangan" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->ulangan }}">
                      </div>
                      <div class="form-group">
                        <label for="uts">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->uts }}">
                   </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="performance">Nilai Performance</label>
                        <input type="number"  class="form-control" name="performance"placeholder="Masukkan Nilai" value="{{ $mapel->pivot->performance }}">
                      </div>
                      <div class="form-group">
                        <label for="project">Nilai Project</label>
                        <input type="number" class="form-control" name="project" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->project }}">
                      </div>
                      <div class="form-group">
                        <label for="product">Nilai Product</label>
                        <input type="number" class="form-control" name="product" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->product }}">
                      </div>
                      <div class="form-group">
                        <label for="sikap">Nilai Sikap</label>
                        <input type="number" class="form-control" name="sikap" placeholder="Masukkan Nilai" value="{{ $mapel->pivot->sikap }}">
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
