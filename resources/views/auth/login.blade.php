
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio de sesión | Sistema escolar</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="text-center">
                          
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="row" >
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/undraw_mobile_payments_re_7udl.svg" alt="" 
                                height="480" width="460">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicia sesión</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" 
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                                id="exampleInputEmail" aria-describedby="emailHel"
                                                placeholder="Cuenta...">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"  name="password"
                                            required autocomplete="current-password"  aria-describedby="emailHel"
                                                placeholder="Contraseña"
                                            >

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              
                                        </div>


                                      
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>  
                                                <label class="custom-control-label" for="remember">Recordar</label>
                                            </div>
                                        </div> 
                                       
                                        <button type="submit" class="btn bg-danger text-white btn-user btn-block">
                                            {{ __('Ingresar') }}
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center ">
                                        <a class="small text-secondary" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-secondary" href="{{ route('register') }}">!Crea tu cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>