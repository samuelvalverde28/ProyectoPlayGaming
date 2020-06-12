@extends('layouts.app')

@section('content')

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">

          <nav class="navbar navbar-light  fondo">
            <form class="form-inline">
              <a href=" {{ route('all')}}" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>

              <div class="form-group">
                <input name="buscarjuegos" id="buscarjuegos" class="form-control mr-sm-2" type="search" placeholder="Buscar nombres de juegos" aria-label="Search">
                <div id="buscarjuegosList" style="position: fixed; top:145px; z-index:1" ></div>
              </div>
              {{ csrf_field() }}

              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </nav>

          

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
                @foreach ($Game as $Gamer)
                @php($true=0)
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0  respon">
                    
                      <button class="btn btn-link respon" type="button" data-toggle="collapse" data-target="#collapse{{$Gamer->id}}" aria-expanded="false" aria-controls="collapse{{$Gamer->id}}" onclick="cambioFlecha('boton{{$Gamer->id}}', 'flecha{{$Gamer->id}}')" id="boton{{$Gamer->id}}">
                        <img src="{{$Gamer->background_image}}" alt="foto de {{$Gamer->name}}" class="imagenes_peque"> 
                        {{ $Gamer->name}}
                        <i class="fas fa-angle-down" id="flecha{{$Gamer->id}}"></i>
                        
                      </button>
                      
                      @foreach( $Usersgame as $Usergame)
                      @if( $Usergame->idgames == $Gamer->id && $Usergame->idusers == Auth::user()->id )
                          @php($true=1)
                      @endif
                      @endforeach

                      @if($true == 1)
                          <a href="borrar/{{$Gamer->id}}"><i class="fas fa-minus-circle eliminar"></i></a>
                        @else
                        <a href="guardar/{{$Gamer->id}}"><i class="fas fa-plus-circle add"></i></a>
                        @endif

                      
                      
                      
                      
                      
                      
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

                    <div class="centrarComentarios">
                      <a href="comentarios/{{$Gamer->id}}" class="comments"><i class="far fa-comments"></i>   Comentarios</a>
                    </div>
                    
                    </div>
                  </div>
                </div>
                @endforeach

                <div class="paginacion" style="margin-top: 15px;">
                  {{$Game->links()}}
                </div>

                

                
              </div>



        </div>
    </div>
</div>


<script type="application/javascript">
  $(document).ready(function(){

      $('#buscarjuegos').keyup(function(){
          var query = $(this).val();
          if(query != '')
          {
              var _token = $('input[name="_token"]').val();

              $.ajax({
                  url:"{{ route('all.fetch') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data)
                  {
                      $('#buscarjuegosList').fadeIn();
                      $('#buscarjuegosList').html(data);
                      
                  }
              })
          }
      });

      $(document).on('click', 'li', function(){
          $('#buscarjuegos').val($(this).text());
          $('#buscarjuegosList').fadeOut();
      });

  });
</script>




@endsection

