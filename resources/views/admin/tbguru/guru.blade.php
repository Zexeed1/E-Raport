@extends('template.LTE')

@section('content')
@include('template.preloader')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Data Guru</h1>
                        <div class="card-tools">
                            <a href="{{ route('addGuru') }}" type="button" class="btn btn-tool"><i class="fas fa-plus fa-lg"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('update'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('update') }}
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif
                        @if (session('sukses'))
                            <div class="alert alert-info" role="alert">
                                {{ session('sukses') }}
                            </div>
                        @endif
                        <table class="table table-active" id="tb">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama Guru</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th>No.HP</th>
                                <th>Mapel</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th style="text-align: center">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $guru )
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $guru->nama }}</td>
                                        <td>{{ $guru->email }}</td>
                                        <td>{{ $guru->jk }}</td>
                                         <td>{{ $guru->nohp }}</td>
                                        <td>{{ $guru->mapel->mapel }}</td>
                                        <td>{{ $guru->agama }}</td>
                                        <td>{{ $guru->alamat }}</td>
                                        <td>
                                            <a href="/guru/profile/{{ $guru->id }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="/guru/edit/{{ $guru->id }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="/guru/delete/{{ $guru->id }}" type="button" class="btn btn-danger btn-sm toastDafaultDanger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
