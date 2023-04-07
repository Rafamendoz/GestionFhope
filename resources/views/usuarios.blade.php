@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <h5 class=" font-weight-bold text-primary">Data de Usuarios</h5>

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