<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Raport | Log in</title>
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
<body class="hold-transition login-page">
    <style>
         body{
            background-image: url(./images/background2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
         }
    </style>
<div class="login-box">

  <!-- /.login-logo -->
  @include('template.prelod')
  <div class="card">
    <div class="card-body rounded login-card-body">
        <div class="login-logo">
            <img src="/images/logo-fis.png" alt="logo_sekolah" width="200px">
        </div>
      <p class="login-box-msg">Aplikasi E-Raport</p>
        @if (session('success'))
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
      <form action="/masuk" method="POST">
        @csrf
            @if (count($errors) > 0)
                <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
            </div>
            @endif
            @if(session('berhasil'))
                <div class="alert alert-success"></div>
            @endif
            @foreach ($semester as $semester )@endforeach
        <div class="form-group">
          <label for="email" class="form-label">Username / Email</label><i class="fas fa-user col-2"></i>
          <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ Session::get('email') }}" placeholder="Masukkan username" name="email">
        </div>
        <div class="form-group">
          <label for="password" class="form-label"></i>Password</label><i class="fas fa-key col-2"></i>
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" name="password">
        </div>
        <div class="form-group">
          <label class="form-label"></i>Tahun Ajaran - Semester</label><i class="fas fa-graduation-cap col-2"></i>
          <input type="text" class="form-control" disabled value="{{ $semester->tahun_ajar }} - {{ $semester->semester }}">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mb-3">
            <button type="submit" name="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
{{-- <script language='JavaScript'>
    var txt="Future Islamic";
    var speed=300;
    var refresh=null;
    function action() { document.title=txt;
    txt=txt.substring(1,txt.length)+txt.charAt(0);
    refresh=setTimeout("action()",speed);}action();
</script> --}}
</body>
</html>
