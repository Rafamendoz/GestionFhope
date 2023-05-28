@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('Colaboradores')}}">Colaboradores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Colaborador</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Datos del Colaborador</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="nombreColaborador" class="col-sm-4 col-form-label">Nombres del Colaborador:</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nombreColaborador">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="apellidoColaborador" class="col-sm-4 col-form-label">Apellidos del Colaborador:</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="apellidoColaborador"></input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="dni" class="col-sm-2 col-form-label">DNI:</label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control" id="dni">
                                            </div>
                                        </div>

                                
                                        
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Estado del Producto:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="estado">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="estado">
                                                        <option selected value="0">Seleccione un estado...</option>
                                                        @foreach ($estados as $estado )
                                                            <option value="{{$estado->id}}">{{$estado->valor}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Puesto del Colaborador:</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="puesto">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="puesto">
                                                        <option selected value="0">Seleccione un puesto...</option>
                                                        @foreach ($puestos as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->puesto_nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>

                                        
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Usuario a asignar:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="usuario">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="usuario">
                                                        <option selected value="0">Seleccione un usuario...</option>
                                                        @foreach ($usuarios as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->user}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>
                                
                                
                                
                                        <button type="button" onclick="Guardar()" class="btn btn-primary">Guardar</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-primary">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                    </div>
                                </div>

                                <div class="card-body bg-white">
                                    
                                        <div class="row p-2">
                                            
                                                <div class="col-sm-12">
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Colaboradores</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar la informacion de los colaboradores, por favor introduzca la informacion solicitada.
                                                  </p>
                                                </div>
                                               
                                            
                                        </div>

                                        <div class="row p-2">
                                        <div class="col-sm-12">
                                                    <img class="img-profile rounded-circle"
                                                        src="{{ asset('build/img/undraw_profile.svg')}}">
                                                </div>
                                        </div>

            

                                </div>
                            
                                
                                
                            </div>

                        </div>


                    </div>
                  

               


        
@endsection

<script>

    function Guardar(){
        let nombreColaborador = $("#nombreColaborador").val().toUpperCase();
        let apellidoColaborador = $("#apellidoColaborador").val().toUpperCase();
        let dni = $("#dni").val();
        let estado = $("#estado").val();
        let puesto = $("#puesto").val();
        let usuario = $("#usuario").val();
        $.ajax({
        method: "POST",
        url: "../../api/colaboradorR/add",
        data: {
            "colaborador_nombres": nombreColaborador,
            "colaborador_apellidos": apellidoColaborador,
            "colaborador_DNI": dni,
            "colaborador_puesto": puesto,
            "estado":estado,
            "colaborador_idusuario":usuario
        }
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            mostrarMensaje(response['Data_Respuesta'])
        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            mostrarMensaje(response['responseJSON']);

        });
    }

    function mostrarMensaje(dataResponse){
         
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        didClose: (toast) => {
                if(dataResponse.Codigo==200){
                    location.reload();
                }else{
                    console.log("NULL");

                }
    
        }
        })

        if(dataResponse.Codigo==200){
                    Toast.fire({
                    icon: 'success',
                    title: dataResponse.Estado + "! " + dataResponse.Descripcion 
                    })
        }else{
                Toast.fire({
                icon: 'error',
                title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion 
                })
        }
             
    }

    
    
</script>