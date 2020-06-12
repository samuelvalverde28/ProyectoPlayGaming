@php
use App\Platform;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="">
        <div class="col-md-12">


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



            <h3 class="paginacion tituloconfigJuegos">Juegos</h3> 

            <a href=" {{ route('configJuegos')}}" class="btn btn-primary float-left col-md-3" style="margin-left: 15px;" data-toggle="modal" data-target="#modal_nuevoJuego">Añadir Juego</a>
            @include('adminJuegos.modal_nuevoJuego')

            
            <nav class="navbar navbar-light float-right">
                <form class="form-inline">
                  <a href=" {{ route('configJuegos')}}" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>
                  <input name="buscarjuegos" class="form-control mr-sm-2" type="search" placeholder="Buscar nombres de juegos" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>

            <div class="table-responsive">
                <table class="table table-striped table-dark" style="color: white; font-size: 16px;">
                    <thead>
                    <tr>
                        <th scope="col" class="estatico">#</th>
                        <th scope="col" class="first-col">Name</th>
                        <th scope="col">released</th>
                        <th scope="col">background_image</th>
                        <th scope="col">rating</th>
                        <th scope="col">rating_top</th>
                        <th scope="col">clip</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Plataformas</th>
                        <th scope="col">Imagenes</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Game as $game)    
                            <tr>
                                <th scope="row" class="estatico">{{$game->id}}</th>
                                <td class="first-col">{{$game->name}}</td>
                                <td>{{$game->released}}</td>
                                <td> <img src="{{$game->background_image}}" alt="{{$game->name}}" class="imagenes_peque"> </td>
                                <td>{{$game->rating}}</td>
                                <td>{{$game->rating_top}}</td>
                                <td>{{$game->clip}}</td>
                                <td class="center"><a href=" {{ route('configJuegos') }} " data-toggle="modal" data-target="#modal_eliminarJuego{{$game->id}}"><i class="fas fa-trash-alt"></i></a></td>
                                <td class="center"><a href="actualizarJue/{{$game->id}}"><i class="fas fa-user-edit"></i></a></td>
                                <td>
                                  
                                    @foreach ($GamesPlatform as $gp)
                                  
                                     
                                            @if ( $gp->idgames == $game->id)
                                              {{ Platform::where('id', $gp->idplatforms)->first()->name }}
                                            @endif

                                        @endforeach   
                                    

                                </td>
                                <td class="center"><a href="configImagenes/{{$game->id}} "><i class="far fa-images"></i></a></td>
                            </tr>
                            @include('adminJuegos.modal_eliminarJuego')
                            @include('adminJuegos.modal_modificarJuego')
                    @endforeach
                            
                    
                    </tbody>
                </table>


                
                

            </div>

            <div class="paginacion" >
                {{$Game->links()}}
            </div>
            

        </div>
    </div>
</div>
@endsection