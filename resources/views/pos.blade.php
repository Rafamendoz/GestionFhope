@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item active" aria-current="page">POS</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="container">
                        <div class="row">
                            <div class=" col-md-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-primary">Datos del Cliente</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row p-2">
                                        <form class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">DNI:</label>
                                                <input type="number" class="form-control" id="dni">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Usuario:</label>
                                                <input readonly type="text" class="form-control" id="usuario" value="{{auth()->user()->user}}">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="inputAddress" class="form-label">Direccion de Envio:</label>
                                                <input type="text" class="form-control" id="direccion" placeholder="1234 Main St">
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">Nombre del Cliente:</label>
                                                <input type="text" class="form-control" id="nombrecliente" readonly>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label for="inputZip" class="form-label">Correo Electronico:</label>
                                                <input type="text" class="form-control" id="correo" readonly>
                                            </div>
                                           
                                          
                                        </form>
                                        <div class="col-12 ">
                                                <button onclick="Buscar()" class="btn btn-primary">Buscar</button>
                                            </div>

                                        </div>
                                     
                                    
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-primary">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                        </div>
                                    </div>

                                    <div class="card-body bg-white">
                                        
                                            <div class="row p-2">
                                                
                                                    <div class="col-sm-12">
                                                    <h4 class="text-center font-weight-bold text-primary">Productos</h4>
                                                    </div>
                                                
                                                
                                            </div>

                                            <div class="row p-2">
                                                    <form class="row g-3">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="inputEmail4" class="form-label">Codigo Producto:</label>
                                                            <input type="number" class="form-control" id="producto_codigo">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="inputCity" class="form-label">Cantidad:</label>
                                                            <input type="text" class="form-control" id="cantidad" readonly>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="inputPassword4" class="form-label">Nombre:</label>
                                                            <input readonly type="text" class="form-control" id="nombre" value="Sudadera">
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="inputAddress" class="form-label">Descripcion:</label>
                                                            <input readonly type="text" class="form-control" id="descripcion" placeholder="1234 Main St">
                                                        </div>
                                                        <div class="col-12 mb-3" hidden id="CapaDescuento">
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck" onclick="MostrarDescuento()">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Aplicar Descuento?
                                                            </label>
                                                            </div>
                                                        </div>
                                                    
                                                        
                                                
                                                        <div class="col-md-12" hidden id="CapaCantidadDescuento">
                                                            <label for="inputCity" class="form-label">Descuento en Lempiras:</label>
                                                            <input type="number" class="form-control" id="descuento" >
                                                        </div>


                                                
                                                
                                                
                                                    </form>

                                                    <div class="col-12" id="CapaBotonBuscarProducto">
                                                        <button onclick="BuscarProducto()" class="btn btn-primary">Buscar</button>
                                                    </div>

                                                    <div class="col-12" id="CapaBotonAgregar" hidden>
                                                        <button onclick="AdicionarProducto()" class="btn btn-warning">Agregar</button>
                                                    </div>
                                    
                                            </div>


                

                                    </div>
                                
                                    
                                    
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <div class=" col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-primary">Detalle de Pedido</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N.</th>
                                            <th>Codigo Producto</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Descuento</th>
                                            <th>Isv</th>
                                            <th>Subtotal</th>
                                            <th>Acciones</th>



                                        </tr>
                                    </thead>
                            
                                        <tbody class="text-center" id="tbody">
                                          
                                            
                                            
                                        </tbody>
                                </table>
                            </div>
                                        
                                       

                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                  

                    
             


        
@endsection

<script>
    let productoactual;
    let contadorf =0;
    function Buscar(){

        let dni = $("#dni").val();
        if(dni==""){
             
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
     
            })

            Toast.fire({
                    icon: 'warning',
                    title: 'No ha completado los datos requeridos' 
                    })


        }else{
            
        $.ajax({
        method: "GET",
        url: "../../api/clienteR/"+dni,
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            $("#correo").val(response['Cliente'][0].cliente_correo);
            $("#nombrecliente").val(response['Cliente'][0].cliente_nom);
            mostrarMensaje(response['Response']);

        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensaje(response['responseJSON']);

        });

        }


      
    }
    
    function BuscarProducto(){

        let codigoproducto = $("#producto_codigo").val();
        if(codigoproducto==""){
            
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

            })

            Toast.fire({
                    icon: 'warning',
                    title: 'No ha completado los datos requeridos' 
                    })


        }else{
            
            $.ajax({
            method: "GET",
            url: "../../api/productoR/"+codigoproducto,
            })
            .done(function( data ) {
                let response = JSON.parse(JSON.stringify(data));
                productoactual = response;
                $("#nombre").val(response['Producto'].producto_nom);
                $("#descripcion").val(response['Producto'].producto_des);
                mostrarMensaje(response['Response']);
                $("#CapaBotonBuscarProducto").attr('hidden',true);
                $("#CapaBotonAgregar").attr('hidden',false);
                $("#CapaDescuento").attr('hidden',false);
                $("#cantidad").attr('readonly',false);

                console.log(productoactual);
            }).fail(function(data){
                let response = JSON.parse(JSON.stringify(data));
                console.log(response);
                mostrarMensaje(response['responseJSON']);

            });

        }



    }

    function MostrarDescuento(){
        if($("#gridCheck").is(":checked")){
            $("#CapaCantidadDescuento").attr('hidden',false);
        }else{
            $("#CapaCantidadDescuento").attr('hidden',true);
        }
    }

    function AdicionarProducto(){
        let fila = $("#tbody tr").length;
        let precio = productoactual["Producto"].precio;
        let cantidad = $("#cantidad").val();
        let descuentounitario = $("#descuento").val();
        let descuentot = descuentounitario*cantidad;
        let isv = 0.00;
        let subtotal = (precio*cantidad)-descuentot;
        if(contadorf ==0){
            $("#tbody tr").remove();
            contadorf+=1;
            $("#tbody").append("<tr id=\"tr"+contadorf+"\"><td>"+fila+"</td>"+
            "<td>"+productoactual["Producto"].id+"</td>"+
            "<td>"+productoactual["Producto"].producto_nom+"</td>"+
            "<td>"+precio+"</td>"+
            "<td>"+cantidad+"</td>"+
            "<td>"+descuentot+"</td>"+
            "<td>"+isv+"</td>"+
            "<td>"+subtotal+"</td>"+
            "<td><button class=\"btn btn-danger btn-sm\" type=\"button\"><i class=\"fas fa-trash\" onclick=\"eliminarFila("+fila+")\"></i></button></td>"+
            "</tr>");
            contadorf+=1;
        }else{
            fila+=1;
            $("#tbody").append("<tr id=\"tr"+fila+"\"><td>"+fila+"</td>"+
            "<td>"+productoactual["Producto"].id+"</td>"+
            "<td>"+productoactual["Producto"].producto_nom+"</td>"+
            "<td>"+precio+"</td>"+
            "<td>"+cantidad+"</td>"+
            "<td>"+descuentot+"</td>"+
            "<td>"+isv+"</td>"+
            "<td>"+subtotal+"</td>"+
            "<td><button class=\"btn btn-danger btn-sm\" type=\"button\"><i class=\"fas fa-trash\" onclick=\"eliminarFila("+fila+")\"></i></button></td>"+
            "</tr>");
            contadorf+=1;

        }
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
                    console.log("NULL1");
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

    function eliminarFila(fila){
        contadorf-=1;
        $("#tr"+fila).remove();
        console.log(contadorf);
    }

    
    
</script>