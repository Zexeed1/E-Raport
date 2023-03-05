@extends('template.LTE')

@section('content')
<form action="/guru/update/{{ $guru->id }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
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
            <h6>Form Edit Data Guru</h6>
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
                <input type="text" id="inputName" class="form-control" name="nama" value="{{ $guru->nama }}">
              </div>

              <div class="form-group">
                <label for="inputDescription">Jenis Kelamin *</label>
                <select id="inputStatus" class="form-control custom-select" name="jk">
                  <option selected disabled>{{ $guru->jk }}</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Nomor Handphone *</label>
                <input type="text" id="inputClientCompany" class="form-control" name="nohp" placeholder="+62(...)-(....)-(....)" value="{{ $guru->nohp }}">
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
                <input type="text" id="inputEstimatedBudget" class="form-control" name="agama" value="{{ $guru->agama }}">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Email *</label>
                <input type="email" id="inputSpentBudget" class="form-control" name="email" disabled value="{{ $guru->email }}">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Alamat *</label>
                <input type="text" id="inputEstimatedDuration" class="form-control" name="alamat" value="{{ $guru->alamat }}">
              </div>
                 <div class="form-group">
                <label for="inputEstimatedDuration">Foto Guru</label>
                <input type="file" name="avatar" disabled value="{{ $guru->avatar }}"><img  class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$guru->avatar) }}" alt=""></input>
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
