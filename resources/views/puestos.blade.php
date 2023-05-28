@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->
 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="bg-white breadcrumb shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item active" aria-current="page">Puestos</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data de Puestos</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-plus fa-sm fa-fw text-primary-400"></i>
                                        </a>

                                       

                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Acciones</div>
                                            <a class="dropdown-item" href="{{route('AddPuesto')}}">Agregar Puesto</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N.</th>
                                            <th>Puesto</th>
                                            <th>Estado</th>
                                            <th>Creacion</th>
                                            <th>Actualizacion</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                            
                                 <tbody class="text-center">
                                        @foreach ($puestos as $puesto)
                                            <tr>
                                                <td>{{ $puesto->id }}</td>
                                                <td>{{ $puesto->puesto_nombre }}</td>
                                                <td>{{$puesto->estado }}</td>
                                                <td>{{$puesto->created_at }}</td>
                                                <td>{{$puesto->updated_at }}</td>
                                                <td>
                                                            <button class="btn btn-danger btn-sm" type="button" onclick="ConsultarEliminar({{ $puesto->id }})"><i class="fas fa-trash"></i></button>
                                                            <button class="btn btn-primary btn-sm" type="button"><i class="fas fa-save"></i></button>
                                                        
                        
                                                      
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        
@endsection

<script>

    function ConsultarEliminar(id){
        Swal.fire({
                    title: '¿Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Eliminar(id);
                    }
        })
    }

    function Eliminar(id){

        $.ajax({
        method: "PUT",
        url: "../../api/puestoR/delete/"+id,
        data: { "estado":2}
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
                    location.reload();
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