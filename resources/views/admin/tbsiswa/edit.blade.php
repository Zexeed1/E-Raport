@extends('template.LTE')

@section('content')
<form action="/siswa/update/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
@method('put')
@csrf
<div class="container">
    <div class="row">
        <div class="col-md-12">
    {{-- menampilkan error validasi --}}
        <div class="alert alert-primary">
            <h4 style="text-align:center">Form Edit Data Siswa</h4>
        </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Siswa</label>
                <input type="text" id="inputName" class="form-control" name="nama" value="{{ $siswa->nama }}">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">NIS</label>
                <input type="text" id="inputClientCompany" class="form-control" name="nis" value="{{ $siswa->nis }}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Jenis Kelamin</label>
                <select id="inputStatus" class="form-control custom-select" name="jk">
                  <option selected disabled>{{ $siswa->jk }}</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select  class="form-control custom-select" name="kelas_id" id="kelas_id">
                  <option selected disabled>{{ $siswa->kelas->kelas }}</option>
                   @foreach ($kelas as $lokal)
                    <option value="{{ $lokal->id }}">{{ $lokal->kelas }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Agama</label>
                <input type="text" id="inputEstimatedBudget" class="form-control" name="agama" value="{{ $siswa->agama }}">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Username</label>
                <input type="text" id="inputSpentBudget" class="form-control" name="email" disabled value="{{ $siswa->email }}">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Alamat</label>
                <input type="text" id="inputEstimatedDuration" class="form-control" name="alamat" value="{{ $siswa->alamat }}">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Foto Siswa</label>
                <input type="file" name="avatar" disabled value="{{ $siswa->avatar }}"><img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$siswa->avatar) }}" alt="User profile picture"></input>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  <div class="container">
    <div class="container-fluid"></div>
      <div class="card">
        <div class="card-body">
          <div class="col-12">
            <a href="{{ route('siswa') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
          </div>
        </div>
      </div>
    </div>
   </div>
</div>
</form>
@endsection
