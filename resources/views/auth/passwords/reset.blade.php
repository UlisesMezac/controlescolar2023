<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CE - Restablecer contraseña</title>

    <!-- Custom fonts for this template-->
  
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">


                        <!-- Nested Row within Card Body -->
                        <div class="center">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Restablecer contraseña</h1>
                                        
                                    </div>

                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                       
                                    
                                    <form class="user" method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                        
                                        <div class="form-group">

                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email" 
                                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Introduzca la dirección de correo electrónico...">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>


                                        

                                      
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="exampleInputEmail" aria-describedby="emailHelp" name="password"  required autocomplete="new-password" autofocus
                                                    placeholder="Introduzca la nueva contraseña..">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>


                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="password-confirm" aria-describedby="emailHelp"name="password_confirmation"  required autocomplete="new-password" autofocus
                                                    placeholder="Confirmar contraseña..">
                                            </div>
                                        </div>

                   
                                                 <button type="submit"  class="btn btn-danger btn-user btn-block">
                                                   {{ __('Reset Password') }}
                                                 </button>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-secondary"href="{{ route('register') }}">¡Crea una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-secondary" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Accede!</a>
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
