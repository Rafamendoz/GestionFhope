@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->
 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="bg-white breadcrumb shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data de Usuarios</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-plus fa-sm fa-fw text-primary-400"></i>
                                        </a>

                                       

                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Acciones</div>
                                            <a class="dropdown-item" href="{{route('AddUsuario')}}">Agregar Usuarios</a>
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
                                            <th>Identificador</th>
                                            <th>Email</th>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                            <th>Intentos</th>
                                            <th>Estado</th>
                                            <th>Creacion</th>
                                            <th>Actualizacion</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                            
                                 <tbody class="text-center">
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{$user->user }}</td>
                                                <td>{{$user->password }}</td>
                                                <td>{{$user->intentos}}</td>
                                                <td>{{$user->estado }}</td>
                                                <td>{{$user->created_at }}</td>
                                                <td>{{$user->updated_at }}</td>
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