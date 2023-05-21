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
                        <div class="card-header py-3">
                             <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <h5 class=" font-weight-bold text-primary">Data de Puestos</h5>

                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <h7 class=" font-weight-bold text-primary">Add</h6>
                            <button class="btn btn-primary btn-md" type="button"><i class="fas fa-plus"></i></button>
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
                                                            <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-trash"></i></button>
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