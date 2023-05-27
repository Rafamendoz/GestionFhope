@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('Clientes')}}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Cliente</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Datos del Cliente</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="nombrePuesto" class="col-sm-2 col-form-label">Nombre del Cliente:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nombreCliente">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="telefono" class="col-sm-2 col-form-label">Numero de Telefono:</label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control" id="telefono">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="correo" class="col-sm-2 col-form-label">Correo Electronico:</label>
                                            <div class="col-sm-10">
                                            <input type="email" class="form-control" id="correo">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="dni" class="col-sm-2 col-form-label">DNI:</label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control" id="dni">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Estado del Cliente:</label>
                                        <div class="col-sm-10">
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
                                
                                        <button type="button" onclick="Guardar()" class="btn btn-primary">Guardar</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-primary">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                    </div>
                                </div>

                                <div class="card-body bg-white">
                                    
                                        <div class="row p-2">
                                            
                                                <div class="col-sm-10">
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Clientes</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar la informacion de los clientes, por favor introduzca la informacion solicitada.
                                                  </p>
                                                </div>
                                                <div class="col-sm-2">
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
        let nombreCliente = $("#nombreCliente").val().toUpperCase();
        let telefono = $("#telefono").val();
        let correo = $("#correo").val();
        let dni = $("#dni").val();
        let estado = $("#estado").val();

      
        $.ajax({
        method: "POST",
        url: "../../api/clienteR/add",
        data: {
                "cliente_nom":nombreCliente,
                "cliente_tel": telefono, 
                "cliente_correo":correo, 
                "cliente_DNI":dni, 
                "estado":estado
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