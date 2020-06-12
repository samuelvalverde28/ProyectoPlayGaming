

@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="">
        <div class="col-md-13">

            @if( session('datos') )
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('datos')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            @endif

            @if( session('cancelar') )
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('cancelar')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            @endif

            

            <div style="color: white;" class="barra">
              Usuarios
              
              <a href="{{ route('configUsuarios')}}" class="btn btn-info " style="margin-bottom: 5px;" data-toggle="modal" data-target="#modal_nuevoUsuario">Nuevo Usuario</a>
            </div>

            @include('admin.modal_nuevoUsuario')
            <div class="table-responsive">
                <table class="table table-striped table-dark" style="color: white; font-size: 16px;">
                    <thead>
                    <tr>
                        <th scope="col" style="margin-left: 1px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($User as $us)    
                            <tr>
                            <th scope="row">{{$us->id}}</th>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                <td>{{$us->role}}</td>
                                <td>{{$us->created_at}}</td>
                                <td style="text-align: center;"><a href=" {{ route('configUsuarios') }} " data-toggle="modal" data-target="#modal_eliminar{{$us->id}}"><i class="fas fa-trash-alt"></i></a></td>
                                <td style="text-align: center;"><a href="actualizar/{{$us->id}}"><i class="fas fa-user-edit"></i></a></td>
                            </tr>
                            @include('admin.modal_eliminar')
                            @include('admin.modal_modificar')
                    @endforeach
                    
                        
                    </tbody>
                </table>


            </div>



        </div>
    </div>
</div>
@endsection








