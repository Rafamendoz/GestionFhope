@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('Puestos')}}">Puestos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Puesto</li>
  </ol>
</nav>
 <h1 class="h3 mb-2 text-gray-800">Puestos</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <h5 class=" font-weight-bold text-primary">Data de Puestos</h5>
                            </div>
                         
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <label for="nombrePuesto" class="col-sm-2 col-form-label">Nombre del Puesto:</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="nombrePuesto">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Estado del Puesto:</label>
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


        
@endsection

<script>

    function Guardar(){
        let puesto_nombre = $("#nombrePuesto").val().toUpperCase();
        let estado = $("#estado").val();

      
        $.ajax({
        method: "POST",
        url: "../../api/puestoR/add",
        data: { "puesto_nombre": puesto_nombre, "estado":estado}
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensaje(response['Data_Respuesta'])
        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
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
                console.log("Edn");
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
        })}
       


 
    }
    
</script>