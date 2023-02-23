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
                    <th scope="col">Kelas</th>
                    <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $lokal )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $lokal->kelas }}</td>
                            <td>
                                <a type="button" class="btn btn-danger" href="/kelas/delete/{{ $lokal->id }}"><i class="fas fa-trash"></i></a>
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

@endsection
