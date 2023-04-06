<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Inicio de sesión | Sistema escolar</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger  shadow-lg" >
           
            <div class="card-body">
            <p class="login-box-msg">Inicia sesión</p>
                <div class=" text-center">
                    <img src="img/usuario.png"  class="brand-image img-circle elevation-3">
                </div>
                <br><br>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" placeholder="Correo electronico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"  
                        name="password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-danger">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Recordar
                            </label>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-danger btn-block" style=" background-color:#E30707"> {{ __('Ingresar') }}</button>
                    </div>
                </form>
                <p class="mb-1">
                        <a href="{{ route('password.request') }}">¿Olvido su contraseña?</a>
                </p>
                <p class="mb-1">
                        <a href="{{ route('register') }}">¿!Crea tu cuenta!</a>
                </p>
            </div>
        </div>
    </div>
    <script src="../../plugins/jquery/jquery.min.js"></script>
 
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>