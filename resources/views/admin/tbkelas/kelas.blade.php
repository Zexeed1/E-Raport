@extends('template.LTE')

@section('content')
@include('template.preloader')
<form action="/kelas/simpan" method="POST">
@csrf
<div class="container">
    <div class="row">
        <div class="col-md-12">
    {{-- menampilkan error validasi --}}
    @if (session('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session('delete') }}
        </div>
    @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
    {{-- menampilkan error validasi --}}

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kelas</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Kode Kelas*</label>
                <input type="text"  class="form-control" name="kode_kelas">
              </div>
              <div class="form-group">
                <label for="inputName">Kelas*</label>
                <input type="text" id="inputName" class="form-control" name="kelas">
              </div>

              <a href="{{ route('siswa') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
            <!-- /.card-body -->
          </div>
          </form>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tabel Kelas</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $lokal )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $lokal->kode_kelas }}</td>
                            <td>{{ $lokal->kelas }}</td>
                            <td>
                                <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Update{{ $lokal->id }}"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $lokal->id }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
   <div class="container">
    <div class="container-fluid"></div>
      <div class="row">
        <div class="col-2">

        </div>
      </div>
    </div>
   </div>
</div>
</div>

@foreach($kelas as $lokal)
<div class="modal fade" id="Update{{ $lokal->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Edit Kelas</h5>
      </div>
      <div class="modal-body">
       <form action="/kelas/update/{{ $lokal->id }}" method="POST">
       @csrf
       @method('put')
        <div class="form-group">
          <label for="inputName">Kode Kelas*</label>
          <input type="text" id="inputName" class="form-control" name="kode_kelas" value="{{ $lokal->kode_kelas }}">
        </div>
        <div class="form-group">
          <label for="inputName">Kelas*</label>
          <input type="text" id="inputName" class="form-control" name="kelas" value="{{ $lokal->kelas }}">
        </div>
        <a  class="btn btn-secondary" data-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal{{ $lokal->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus Kelas {{ $lokal->kelas }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/kelas/delete/{{ $lokal->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
