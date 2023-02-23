@extends('template.LTE')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="col-12"><a href="{{ route('home') }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i>  Kembali</a></div><br>
        </div>
    </div>
</div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class=" img-circle" src="{{ asset('images/'. Auth::user()->avatar) }}" alt="User profile picture">
              </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->role }}</p>
            </div><!-- /.card-body -->
          </div> <!-- /.card -->
        </div><!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
                <b>{{ __('User Profile Update') }}</b>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    @if (session('gagal'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('gagal') }}
                        </div>
                    @endif
                  <form class="form-horizontal" method="POST" action="{{ route('update-password') }}">
                    @csrf
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control @error('oldpassword')is-invalid @enderror"  name="oldpassword" placeholder="Masukkan password lama"> @error('oldpassword') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('password')is-invalid @enderror" placeholder="Masukkan password baru" name="password" > @error('password') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('password_confirm')is-invalid @enderror" placeholder="Konfirmasi Password" name="password_confirm"> @error('password_confirm') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div> <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection


