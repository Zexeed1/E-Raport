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
            <div class="align-items-center justify-content-center">
          <div class="card card-primary mx-auto">
            <div class="card-header">
              <h3 class="card-title">Tahun Ajaran Dan Semester</h3>

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
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Semester</th>
                     <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semester as $semester )
                        <tr>
                            <td>{{ $semester->tahun_ajar }}</td>
                            <td>{{ $semester->semester }}</td>
                            <td>
                                <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Update{{ $semester->id }}"><i class="fa fa-pencil"></i></a>
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
</div>

@foreach($semesters as $semester)
<div class="modal fade" id="Update{{ $semester->id }}" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateLabel">Edit semester</h5>
      </div>
      <div class="modal-body">
       <form action="/semester/update/{{ $semester->id }}" method="POST">
       @csrf
       @method('put')
        <div class="form-group">
          <label for="inputName">Tahun Ajaran*</label>
          <input type="text" id="inputName" class="form-control" name="tahun_ajar" value="{{ $semester->tahun_ajar }}">
        </div>
        <div class="form-group">
          <label for="inputName">semester*</label>
          <input type="text" id="inputName" class="form-control" name="semester" value="{{ $semester->semester }}">
        </div>
        <a  class="btn btn-secondary" data-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
     </form>
    </div>
  </div>
</div>
@endforeach

@endsection
