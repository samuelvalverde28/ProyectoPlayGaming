@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header centrado">
          <h2><i class="fas fa-angle-double-right"></i> Bienvenido {{ Auth::user()->name }} <i
              class="fas fa-angle-double-left"></i></h2>
        </div>
        <div class="card-body">
          <div class="centrado">

            <a href="{{ route('modificarImagenProfile')}}" class="imgProfile" data-toggle="modal" data-target="#modal_modificarImagenProfile">
              <img src="{{Auth::user()->imgProfile}}" alt="Imagen perfil" class="imgProfile">
              <div class="letra">
                si deseas cambiar de imagen, pulse en ella.
              </div>
            </a>

            @include('cliente.modal_modificarImagenProfile')


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




            {{-- <div>Jugando</div>
            <div class="progress progreso">
              
              <div class="progress-bar bg-success" role="progressbar" style="width: {{$porJugando}}%" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100">{{$jugando}}/{{$total}}</div>
            </div>

            <div>Completado</div>
            <div class="progress progreso">
              <div class="progress-bar bg-info" role="progressbar" style="width: {{$porCompletado}}%" aria-valuenow="50"
                aria-valuemin="0" aria-valuemax="100">{{$completado}}/{{$total}}</div>
            </div>

            <div>Espera</div>
            <div class="progress progreso">
              <div class="progress-bar bg-warning" role="progressbar" style="width: {{$porEspera}}%" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100">{{$espera}}/{{$total}}</div>
            </div>


            <div>Dejado</div>
            <div class="progress progreso">
              <div class="progress-bar bg-danger" role="progressbar" style="width: {{$porDejado}}%" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100">{{$dejado}}/{{$total}}</div>
            </div> --}}
            
            <div class="canvasContainer">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            
          </div>

            

        </div>
      </div>
    </div>
  </div>
</div>


<script type="application/javascript">
  $(document).ready(function(){
      var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                labels:['Jugando','Completado','Espera','Dejado'],
                datasets:[{
                        label:'Num datos',
                        data:[{{$jugando}},{{$completado}},{{$espera}},{{$dejado}}],
                        backgroundColor:[
                            'rgb(82, 219, 57,0.5)',
                            'rgb(0, 96, 255,0.5)',
                            'rgb(249, 255, 0,0.5)',
                            'rgb(255, 0, 0,0.5)'
                        ],
                        borderColor: "black",
                        borderWidth: 1
                }]
            }
        });


  });
</script>




@endsection


