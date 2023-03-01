@extends('template.LTE')

@section('content')
@include('template.preloader')

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
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Mata Pelajaran Genap</h3>

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
                    <th scope="col">Kode Mata Pelajaran</th>
                    <th scope="col">Singkatan</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Pengajar</th>
                    <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapels as $mapel )
                        <tr>
                            <td>{{ $mapel->kode_mapel }}</td>
                            <td>{{ $mapel->kd_singkat }}</td>
                            <td>{{ $mapel->mapel }}</td>
                            <td>{{ $mapel->guru->nama }}</td>
                            <td>
                                <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Update{{ $mapel->id }}"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $mapel->id }}"><i class="fa fa-trash"></i></a>
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
</div>

@foreach($mapels as $mapel)
<div class="modal fade" id="Update{{ $mapel->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Edit mapel</h5>
      </div>
      <div class="modal-body">
       <form action="/mapel/update/{{ $mapel->id }}" method="POST">
       @csrf
       @method('put')
        <div class="form-group">
          <label for="inputName">Tahun Ajaran*</label>
          <input type="text" id="inputName" class="form-control" name="kode_mapel" value="{{ $mapel->kode_mapel }}">
        </div>
        <div class="form-group">
          <label for="inputName">Tahun Ajaran*</label>
          <input type="text" id="inputName" class="form-control" name="kd_singkat" value="{{ $mapel->kd_singkat }}">
        </div>
        <div class="form-group">
          <label for="inputName">Mata Pelajaran*</label>
          <input type="text" id="inputName" class="form-control" name="mapel" value="{{ $mapel->mapel }}">
        </div>
        <div class="form-group">
          <label class="form-label">Guru Yang Mengampu</label>
           <select class="form-control" name="mapel_id">
            <option selected disabled>Pilih Guru</option>
            @foreach ($guru as $pengajar)
            <option value="{{ $pengajar->id }}">{{ $pengajar->nama }}</option>
            @endforeach
           </select>
        </div>
        <a  class="btn btn-secondary" data-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal{{ $mapel->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus Mata Pelajaran {{ $mapel->mapel }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/data/{{ $mapel->id }}" method="POST">
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
