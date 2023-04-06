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
        <div class="card card-outline card-danger  shadow-lg">
            <div class="card-body login-card-body">
                <p class="login-box-msg">¿Olvidaste tu contraseña? <br>
                    Lo entendemos, pasan cosas. ¡Simplemente ingrese su dirección de correo electrónico 
                                            a continuación y le enviaremos un enlace para restablecer su contraseña!</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                        placeholder="Correo electronico" name="email"  value="{{ old('email') }}">
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
                    <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger btn-user btn-block"  style=" background-color:#E30707">
                            {{ __('Enviar enlace de restablecimiento') }}
                        </button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>
            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Accede!</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">¡Crea una cuenta!</a>
            </p>
            </div>
        </div>
    </div>
</body>
</html>