@extends('layouts.app')

@section('content')
<div class="container">
  <ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
      <a class="nav-link " href=" {{ route('catalogo') }} ">Todos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href=" {{ route('jugando') }} ">Jugando</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('completado') }}">Completado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href=" {{ route('espera') }} ">Espera</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href=" {{ route('dejado') }} ">Dejado</a>
    </li>
  </ul>
  


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


            <div class="accordion" id="accordionExample">

                @foreach ($Usersgame as $Usergame)
                  
                  @if ($Usergame->idusers == Auth::user()->id)

                    @foreach ($Game as $Gamer)
                    
                      @if ($Gamer->id == $Usergame->idgames && $Usergame->estado == 'espera')
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0  respon">
                              
                              <button class="btn btn-link respon" type="button" data-toggle="collapse" data-target="#collapse{{$Gamer->id}}" aria-expanded="false" aria-controls="collapse{{$Gamer->id}}" onclick="cambioFlecha('boton{{$Gamer->id}}', 'flecha{{$Gamer->id}}')" id="boton{{$Gamer->id}}">
                                
                                @if($Usergame->estado == 'jugando')
                                  @php($state = '#38c172')
                                @elseif($Usergame->estado == 'completado')
                                  @php($state = '#6cb2eb')
                                @elseif($Usergame->estado == 'espera')
                                  @php($state = '#ffed4a')
                                @elseif($Usergame->estado == 'dejado')
                                  @php($state = '#e3352f')
                                @endif


                                <img src="{{$Gamer->background_image}}" alt="foto de {{$Gamer->name}}" class="imagenes_peque" style="border: 3px solid {{$state}} ;"> 
                                {{ $Gamer->name}}
                                <i class="fas fa-angle-down" id="flecha{{$Gamer->id}}"></i>
                                
                              </button>

                              
                              <a href="{{route('borrar', $Gamer->id)}}"><i class="fas fa-minus-circle eliminar"></i></a>
                              <a href=" {{ route('catalogo') }} " data-toggle="modal" data-target="#modal_modificar{{$Gamer->id}}"><i class="far fa-edit modificar"></i></a>
                              @include('cliente.modal_modificar')
                              
                            </h2>
                          </div>
                      
                          <div id="collapse{{$Gamer->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
        
                              <div>
                                <h2 style="text-align: center;">{{$Gamer->name}}</h2>
                                <p style="text-align: center;">Fecha de Lanazamiento: {{$Gamer->released}}</p>
                                <p style="text-align: center;">Nota: {{$Gamer->rating}}/{{$Gamer->rating_top}}</p>
                                
                              </div>
        
                              <div class="listas">
                                <ul class="ul_dis">
                                @foreach($GamesPlatform as $gamesPlat)
        
                                @if($gamesPlat->idgames == $Gamer->id)
                                  
                                  
                                  @foreach($Platform as $plat)
                                    
                                      @if($plat->id == $gamesPlat->idplatforms)
                                        <li class="li_dis">{{$plat->name}}</li>
                                      @endif
                                    
                                  @endforeach
        
                                @endif
        
                                @endforeach
                              </ul>
                              </div>
                                
                                                  
                              
                              <!-- carrousel -->
        
                              <div class="containercarvid">
                                
                              
        
                              <div id="carouselExampleIndicators{{$Gamer->id}}" class="carousel slide carouselpersonalizado" data-ride="carousel">
                                <ol class="carousel-indicators">
                                  @php($i = 0)
                                  @foreach ($Image as $image)
        
                                  @if($image->idgames == $Gamer->id)
                                  <li data-target="#carouselExampleIndicators{{$Gamer->id}}" data-slide-to="{{$i}}"></li>
                                  @endif
        
                                  @php($i++)
                                  @endforeach
                                </ol>
        
                                <div class="carousel-inner">
                                @php($number = 0)
                                @foreach($Image as $image)
        
                                @if($image->idgames == $Gamer->id)
                                  @if($number == 0)
                                  <div class="carousel-item active ">
                                    <img src="{{$image->img}}" class="d-block w-100" alt="image">
                                  </div>
                                  @else
                                  <div class="carousel-item ">
                                    <img src="{{$image->img}}" class="d-block w-100" alt="image">
                                  </div>
                                  @endif
                                  @php($number++)
                                @endif
                                
                                @endforeach
                                  
                                  
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$Gamer->id}}" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{$Gamer->id}}" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
        
        
        
        
                              <!-- fin carrousel -->
        
                              <!-- video -->
                              <div class="embed-responsive embed-responsive-16by9 clip">
                                <video src="{{$Gamer->clip}}" controls muted preload="auto"></video>
                              </div>
                              <!-- fin video -->
                            
        
                            </div>
        
        
                            
                            </div>
                          </div>
                        </div>
                      @endif

                    
                    @endforeach

                      
                  @endif




                @endforeach




                


                
              </div>





        </div>
    </div>
</div>
@endsection