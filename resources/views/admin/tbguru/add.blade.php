@extends('template.LTE')

@section('content')
<form action="/guru/simpan" method="POST" enctype="multipart/form-data">
@csrf
<div class="container">
    <div class="row">
        <div class="col-md-12">
    {{-- menampilkan error validasi --}}
        @if (count($errors) > 0)
        <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    <h6>{{ $error }}</h6>
                @endforeach
        </div>
        @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
    {{-- menampilkan error validasi --}}
        <div class="alert alert-info">
            <h6>Form Tambah Data Guru</h6>
        </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">

          <div class="card card-info">
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
                <label for="inputName">Nama Guru *</label>
                <input type="text" id="inputName" class="form-control" name="nama">
              </div>

              <div class="form-group">
                <label for="inputDescription">Jenis Kelamin *</label>
                <select id="inputStatus" class="form-control custom-select" name="jk">
                  <option selected disabled>Pilih Salah Satu</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Nomor Handphone *</label>
                <input type="text" id="inputClientCompany" class="form-control" name="nohp" placeholder="+62(...)-(....)-(....)" value="+62-8">
              </div>
              <div class="form-group">
                <label for="inputStatus">Mata Pelajaran Yang diampu *</label>
                <select id="inputStatus" class="form-control custom-select" name="mapel_id">
                  <option selected disabled>Pilih Mata Pelajaran</option>
                   @foreach ($mapel as $lokal)
                    <option value="{{ $lokal->id }}">{{ $lokal->mapel }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-info">
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
                <label for="inputEstimatedBudget">Agama *</label>
                <input type="text" id="inputEstimatedBudget" class="form-control" name="agama">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Username *</label>
                <input type="text" id="inputSpentBudget" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Alamat *</label>
                <input type="text" id="inputEstimatedDuration" class="form-control" name="alamat">
              </div>
                 <div class="form-group">
                <label for="inputEstimatedDuration">Foto Guru</label>
                <input type="file" class="form-control" name="avatar">
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
            <a href="{{ route('guru') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
          </div>
        </div>
      </div>
    </div>
   </div>
</div>
</div>
</form>
@endsection
