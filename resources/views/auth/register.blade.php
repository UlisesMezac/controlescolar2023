<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro | Sistema escolar</title>

    <!-- Custom fonts for this template-->
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"> 
                        <img src="img/undraw_at_work_re_qotl.svg" alt="" 
                        height="500" width="480">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crea tu cuenta!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                     id="exampleInputEmail" name="name" value="{{ old('name') }}" required autocomplete="name"
                                     
                                        placeholder="Nombre(s)">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>

                            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user @error('apellidoP') is-invalid @enderror" 
                                         id="exampleFirstName"  name="apellidoP" value="{{ old('apellidoP') }}" required autocomplete="apellidoP"
                                            placeholder="Primer apellido">
                                            @error('apellidoP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user @error('apellidoM') is-invalid @enderror" 
                                        id="exampleLastName" name="apellidoM" value="{{ old('apellidoM') }}" required autocomplete="apellidoM"
                                            placeholder="Segundo apellido">
                                            @error('apellidoP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user  @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    id="exampleInputEmail"
                                        placeholder="Cuenta">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
            
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password"
                                            id="exampleInputPassword" placeholder="Contraseña">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" required autocomplete="new-password"
                                            id="exampleRepeatPassword" placeholder="Confirmar contraseña">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </form>
                            <hr>
                           
                            <div class="text-center">
                                <a class="small text-secondary" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Accede!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
