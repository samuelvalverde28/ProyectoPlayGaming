@extends('layouts.app')

@section('content')

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">

         
            <div class="media fondonavbar centrado textoCorreo">
                <span class="centrado textoCorreo2">
                    Buscar personas mediante Correo:
                </span>

                <nav class="navbar navbar-light  ">
                    <form class="form-inline">
                      <a href=" {{ route('follower')}}" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>
                      <input name="buscarfollower" class="form-control mr-sm-2" type="search" placeholder="Buscar correo" aria-label="Search">
                      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                  </nav>    



            </div>


            @foreach ($usuario as $usuarios)
                    <div class="">

                        <div class="card" style="width: 18rem;">
                            <img src="{{$usuarios->imgProfile}}" class="card-img-top" alt="Imagen perfil">
                            <div class="card-body">
                                <h5 class="card-title">{{$usuarios->name}}</h5>
                                <p class="card-text">{{$usuarios->email}}</p>
                                
                                <h2 class="respon">
                                    
                                    @php($true=0)
                                    
                                    @foreach ($follow as $followers)
                                    
                                    
                                    
                                        @if( $followers->idfollow == $usuarios->id && $followers->iduser == Auth::user()->id )
                                            @php($true=1)
                                        @endif
                                    @endforeach

                                    
                                    

                                @if($true == 1)
                                    <a href="borrarFollower/{{$usuarios->id}}"><i class="fas fa-minus-circle eliminar"></i></a>
                                @else
                                    <a href="guardarFollower/{{$usuarios->id}}"><i class="fas fa-plus-circle add"></i></a>
                                @endif

                                </h2>

                                


                            </div>
                          </div>



                        
                    </div>
                @endforeach 




                

                <table class="table" >
                    <thead>
                      <tr class="colorBlanco">
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Link</th>
                        <th scope="col">eliminar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($followInfo as $followInfos)
                            <tr class="colorBlanco">
                                <th scope="row">{{$followInfos->name}}</th>
                                <td>{{$followInfos->email}}</td>
                                <td> <img src="{{$followInfos->imgProfile}}" alt="Imagen perfil" width="50px"> </td>
                                <td><h2><a href="profile/{{$followInfos->idfollow}}"><i class="fas fa-link"></i></a></h2></td>
                                <td> <h2><a href="borrarFollower/{{$followInfos->idfollow}}"><i class="fas fa-minus-circle elimi" ></i></a></h2></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>

                    
                
            





        </div>
    </div>
</div>
@endsection