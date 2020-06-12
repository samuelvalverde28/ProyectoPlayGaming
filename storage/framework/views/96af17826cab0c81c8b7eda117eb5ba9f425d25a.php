<?php $__env->startSection('content'); ?>
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header centrado">
          <h2><i class="fas fa-angle-double-right"></i> Bienvenido <?php echo e(Auth::user()->name); ?> <i
              class="fas fa-angle-double-left"></i></h2>
        </div>
        <div class="card-body">
          <div class="centrado">

            <a href="<?php echo e(route('modificarImagenProfile')); ?>" class="imgProfile" data-toggle="modal" data-target="#modal_modificarImagenProfile">
              <img src="<?php echo e(Auth::user()->imgProfile); ?>" alt="Imagen perfil" class="imgProfile">
              <div class="letra">
                si deseas cambiar de imagen, pulse en ella.
              </div>
            </a>

            <?php echo $__env->make('cliente.modal_modificarImagenProfile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <?php
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

              

            ?>




            
            
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
                        data:[<?php echo e($jugando); ?>,<?php echo e($completado); ?>,<?php echo e($espera); ?>,<?php echo e($dejado); ?>],
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




<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/home.blade.php ENDPATH**/ ?>