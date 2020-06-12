@extends('layouts.app')

@section('content')




<div class="container">

  <div class="row justify-content-center">
    @foreach ($user as $users)
    <div class="col-md-8">

        

      <div class="card">
        <div class="card-header centrado">
          <h2><i class="fas fa-angle-double-right"></i> Perfil de {{$users->name}} <i
              class="fas fa-angle-double-left"></i></h2>
        </div>
        <div class="card-body">
          <div class="centrado">

            
            <img src="{{$users->imgProfile}}" alt="Imagen perfil" class="imgProfile">
            
            
              

            @php
              $jugando = 0;
              $completado = 0;
              $dejado = 0;
              $espera = 0;
              $total = 0;

              foreach ($Usersgame as $us) {
                $total++;

                switch ($us->estado) {
                  case 'jugando':
                    $jugando++;
                    break;
                  case 'completado':
                    $completado++;
                    break;
                  case 'espera':
                    $espera++;
                    break;
                  case 'dejado':
                    $dejado++;
                    break;
                }

              }

              if ($total == 0) {
                $porJugando = 0;
                $porCompletado = 0;
                $porEspera = 0;
                $porDejado = 0;
              } else{
                $porJugando = 100*$jugando/$total;
                $porCompletado = 100*$completado/$total;
                $porEspera = 100*$espera/$total;
                $porDejado = 100*$dejado/$total;
              }

              

            @endphp



          </div>

          <div class="canvasContainer">
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>


        </div>
      </div>


      

      



      


    </div>




    <div class="col-md-12">
      

      <br>

      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <p class="nav-link ">Todos los juegos</p>
        </li>
        
      </ul>

      <div class="accordion" id="accordionExample">

        @foreach ($Usersgame as $Usergame)
          
          @if ($Usergame->idusers == $users->id)

            @foreach ($Game as $Gamer)
            
              @if ($Gamer->id == $Usergame->idgames)
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

                        <div>

                        </div>

                        <img src="{{$Gamer->background_image}}" alt="foto de {{$Gamer->name}}" class="imagenes_peque" style="border: 3px solid {{$state}} ;"> 
                        {{ $Gamer->name}}
                        <i class="fas fa-angle-down" id="flecha{{$Gamer->id}}"></i>

                        
                        


                        
                      </button>

                      
                      <span class="derechaSpan">
                        {{$Usergame->estado}}
                        </span>
                     
                      
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
                      <a href="/comentarios/{{$Gamer->id}}" class="comments"><i class="far fa-comments"></i>   Comentarios</a>
                    </div>


                    
                    </div>
                  </div>
                </div>
              @endif

            
            @endforeach

              
          @endif




        @endforeach




        


        
      </div>






      <br>
      <br>
      <br>






    </div>



    @endforeach

    


  </div>
</div>



<script type="application/javascript">
  $(document).ready(function(){
      var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"horizontalBar",
            data:{
                labels:['Jugando','Completado','Espera','Dejado'],
                datasets:[{
                        label:'Num datos',
                        data:[{{$jugando}},{{$completado}},{{$espera}},{{$dejado}}],
                        backgroundColor:[
                            'rgba(82, 219, 57,0.5)',
                            'rgba(0, 96, 255,0.5)',
                            'rgba(249, 255, 0,0.5)',
                            'rgba(255, 0, 0,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    xAxes:[{
                            ticks:{
                                beginAtZero:true
                            },
                            segmentShowStroke: true
                    }]
                }
            }
        });


  });
</script>







@endsection