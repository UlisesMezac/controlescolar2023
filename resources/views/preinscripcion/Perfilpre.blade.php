@extends('menutema')

@section('titulo')
Inscripción | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Indexpre">Preinscripción</a></li>
              <li class="breadcrumb-item active">Ficha de preinscripción</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center" >
            <div class="card mb-4">
            <div class="form-row justify-content-center">

                    <div class="form-group col-md-4">
                        <a href="">
                            <button type="button" class="btn btn-outline-warning">Editar información</button>
                        </a> 
                    </div>
                    <div class="form-group col-md-4">
                        <a href="">
                        <button type="button" class="btn btn-outline-info"> <i class="fas fa-file-alt"></i> PDF</button>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
  <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-danger card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" 
                    src="" alt="User profile picture"  style="height: 150px; width: 150px">
                    </div>
                    <br>
                    <h3 class="profile-username text-center"></h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered mb-3">

                    <li class="list-group-item">
                        <b>Folio:</b> <a class="float-right"></a>
                    </li>
                    <li class="list-group-item">
                        <b>Nombre(s):</b> <a class="float-right"></a>
                    </li>
                    <li class="list-group-item">
                        <b>Sexo:</b> <a class="float-right"></a>
                    </li>
                    <li class="list-group-item">
                        <b>Fecha de nacimiento:</b><a class="float-right"></a>
                    </li>
                    <li class="list-group-item">
                        <b>Curp:</b> <a class="float-right"></a>
                    </li>

                    <li class="list-group-item">
                        <b><i class="fas fa-phone-alt"></i> Teléfono:</b> <a class="float-right"></a>
                    </li>
                   
                    </ul>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-">
                        <a href="">
                            <button type="button" class="btn btn-outline-warning">Editar información</button>
                        </a> 
                    </div>
                    <div class="form-group col-md-4">
                        <a href="">
                        <button type="button" class="btn btn-outline-info"> <i class="fas fa-file-alt"></i> PDF</button>
                        </a>
                    </div>
                </div>
              </div>
            </div>

            <div class="card" >
              <div class="card-header text-danger">
                <h3 class="card-title"> <i class="fas fa-map-marker-alt mr-1"></i> Dirección</h3>
              </div>
            
              <div class="card-body">
                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>
              </div>
            </div>
          
         
          
        </div>
  </div>
</section>



@endsection