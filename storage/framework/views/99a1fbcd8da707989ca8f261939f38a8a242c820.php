<?php $__env->startSection('content'); ?>




<div class="container">

  <div class="row justify-content-center">
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-8">

        

      <div class="card">
        <div class="card-header centrado">
          <h2><i class="fas fa-angle-double-right"></i> Perfil de <?php echo e($users->name); ?> <i
              class="fas fa-angle-double-left"></i></h2>
        </div>
        <div class="card-body">
          <div class="centrado">

            
            <img src="<?php echo e($users->imgProfile); ?>" alt="Imagen perfil" class="imgProfile">
            
            
              

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

        <?php $__currentLoopData = $Usersgame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Usergame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          <?php if($Usergame->idusers == $users->id): ?>

            <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Gamer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
              <?php if($Gamer->id == $Usergame->idgames): ?>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0  respon">
                      
                      <button class="btn btn-link respon" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($Gamer->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($Gamer->id); ?>" onclick="cambioFlecha('boton<?php echo e($Gamer->id); ?>', 'flecha<?php echo e($Gamer->id); ?>')" id="boton<?php echo e($Gamer->id); ?>">
                        
                        <?php if($Usergame->estado == 'jugando'): ?>
                          <?php ($state = '#38c172'); ?>
                          
                        <?php elseif($Usergame->estado == 'completado'): ?>
                          <?php ($state = '#6cb2eb'); ?>
                        <?php elseif($Usergame->estado == 'espera'): ?>
                          <?php ($state = '#ffed4a'); ?>
                        <?php elseif($Usergame->estado == 'dejado'): ?>
                          <?php ($state = '#e3352f'); ?>
                        <?php endif; ?>

                        <div>

                        </div>

                        <img src="<?php echo e($Gamer->background_image); ?>" alt="foto de <?php echo e($Gamer->name); ?>" class="imagenes_peque" style="border: 3px solid <?php echo e($state); ?> ;"> 
                        <?php echo e($Gamer->name); ?>

                        <i class="fas fa-angle-down" id="flecha<?php echo e($Gamer->id); ?>"></i>

                        
                        


                        
                      </button>

                      
                      <span class="derechaSpan">
                        <?php echo e($Usergame->estado); ?>

                        </span>
                     
                      
                    </h2>
                  </div>
              
                  <div id="collapse<?php echo e($Gamer->id); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                      <div>
                        <h2 style="text-align: center;"><?php echo e($Gamer->name); ?></h2>
                        <p style="text-align: center;">Fecha de Lanazamiento: <?php echo e($Gamer->released); ?></p>
                        <p style="text-align: center;">Nota: <?php echo e($Gamer->rating); ?>/<?php echo e($Gamer->rating_top); ?></p>
                        
                      </div>

                      <div class="listas">
                        <ul class="ul_dis">
                        <?php $__currentLoopData = $GamesPlatform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gamesPlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($gamesPlat->idgames == $Gamer->id): ?>
                          
                          
                          <?php $__currentLoopData = $Platform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                              <?php if($plat->id == $gamesPlat->idplatforms): ?>
                                <li class="li_dis"><?php echo e($plat->name); ?></li>
                              <?php endif; ?>
                            
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                      </div>
                        
                                          
                      
                      <!-- carrousel -->

                      <div class="containercarvid">
                        
                      

                      <div id="carouselExampleIndicators<?php echo e($Gamer->id); ?>" class="carousel slide carouselpersonalizado" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <?php ($i = 0); ?>
                          <?php $__currentLoopData = $Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <?php if($image->idgames == $Gamer->id): ?>
                          <li data-target="#carouselExampleIndicators<?php echo e($Gamer->id); ?>" data-slide-to="<?php echo e($i); ?>"></li>
                          <?php endif; ?>

                          <?php ($i++); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>

                        <div class="carousel-inner">
                        <?php ($number = 0); ?>
                        <?php $__currentLoopData = $Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($image->idgames == $Gamer->id): ?>
                          <?php if($number == 0): ?>
                          <div class="carousel-item active ">
                            <img src="<?php echo e($image->img); ?>" class="d-block w-100" alt="image">
                          </div>
                          <?php else: ?>
                          <div class="carousel-item ">
                            <img src="<?php echo e($image->img); ?>" class="d-block w-100" alt="image">
                          </div>
                          <?php endif; ?>
                          <?php ($number++); ?>
                        <?php endif; ?>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                          
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo e($Gamer->id); ?>" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo e($Gamer->id); ?>" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>




                      <!-- fin carrousel -->

                      <!-- video -->
                      <div class="embed-responsive embed-responsive-16by9 clip">
                        <video src="<?php echo e($Gamer->clip); ?>" controls muted preload="auto"></video>
                      </div>
                      <!-- fin video -->
                    

                    </div>

                    <div class="centrarComentarios">
                      <a href="/comentarios/<?php echo e($Gamer->id); ?>" class="comments"><i class="far fa-comments"></i>   Comentarios</a>
                    </div>


                    
                    </div>
                  </div>
                </div>
              <?php endif; ?>

            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
          <?php endif; ?>




        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        


        
      </div>






      <br>
      <br>
      <br>






    </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    


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
                        data:[<?php echo e($jugando); ?>,<?php echo e($completado); ?>,<?php echo e($espera); ?>,<?php echo e($dejado); ?>],
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







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/profile.blade.php ENDPATH**/ ?>