
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pakar | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/css/app.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Sistem Pakar | Registrasi</p>
      <form action="/register" id="registerform" role="form" method="post">
      @csrf
        <div class="form-group">
                <label >Nama lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="{{old('nama')}}">
                <div class="text-danger">{{ $errors->first('nama') }}</div>
            </div>
        
            <div class="form-group">
                <label >Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                <div class="text-danger">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group">
                <label >Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <div class="form-group">
                <label >Konfirmasi kata sandi</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Tulis ulang kata sandi">
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
      </form>

      <a href="/login" class="text-center">Sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script src="/js/app.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
$("#registerform").validate({
        rules: {
            nama: {
                required: true,
                maxlength: 255,
                
            },
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 50
            }  
        },
        messages: {
            nama: {
                required: "Nama wajib diisi",
                maxlength: "Nama tidak boleh melebihi 255 karakter"
            },
            email: {
                required: "Email wajib diisi",
                email: "Tolong isikan email yang valid"
            },
            password: {
                required: "Kata sandi wajib diisi",
                minlength: "Kata sandi minimal 8 karakter",
                maxlength: "kata sandi tidak boleh melebihi 50 karakter"
            }
        }
    });
});
</script>
</body>
</html>
