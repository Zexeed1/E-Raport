<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Si PEN | Daftar</title>
  <link href="/images/logo-kecil.png" rel="shortcut icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="/images/logo-fis.png" alt="logo_sekolah" width="200px">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Form Register | Membuat User Baru</p>

      <form action="/buat" method="POST">
        @csrf
        @if (count($errors) > 0)
                <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
            </div>
            @endif
        <div class="form-group">
          <label for="name" class="form-label">Nama Pengguna</label><i class="fas fa-user col-2"></i>
          <input type="name" class="form-control" value="{{ Session::get('name') }}" placeholder="Masukkan Nama" name="name">
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label><i class="fas fa-envelope col-2"></i>
          <input type="email" class="form-control" value="{{ Session::get('email') }}" placeholder="Masukkan Email" name="email">
        </div>
        <div class="form-group">
          <label for="password" class="form-label"></i>Password</label><i class="fas fa-key col-2"></i>
          <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
        </div>

        <div class="row">
          <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        <p>Sudah memiliki akun?
          <a href="{{ route('login') }}" class="text-center">Login</a>
        </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
