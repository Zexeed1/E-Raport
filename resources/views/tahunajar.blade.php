@extends('template.LTE')

@section('content')
@include('template.preloader')
<form action="/mapel/simpan" method="POST">
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
        <div class="col-md-12">
          <div class="card card-primary">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semester as $pelajaran )
                        <tr>
                            <td>{{ $pelajaran->tahun_ajar }}</td>
                            <td>{{ $pelajaran->semester }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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