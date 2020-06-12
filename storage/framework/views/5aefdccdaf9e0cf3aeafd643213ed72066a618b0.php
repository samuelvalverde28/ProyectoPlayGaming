<?php $__env->startSection('content'); ?>

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">

          <nav class="navbar navbar-light  fondo">
            <form class="form-inline">
              <a href=" <?php echo e(route('all')); ?>" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>

              <div class="form-group">
                <input name="buscarjuegos" id="buscarjuegos" class="form-control mr-sm-2" type="search" placeholder="Buscar nombres de juegos" aria-label="Search">
                <div id="buscarjuegosList" style="position: fixed; top:145px; z-index:1" ></div>
              </div>
              <?php echo e(csrf_field()); ?>


              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </nav>

          

            <?php if( session('datos') ): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('datos')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            <?php endif; ?>

            <?php if( session('cancelar') ): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('cancelar')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="">&times;</span>
                </button>
              </div>
            <?php endif; ?>


            <div class="accordion" id="accordionExample">
                <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Gamer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($true=0); ?>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0  respon">
                    
                      <button class="btn btn-link respon" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($Gamer->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($Gamer->id); ?>" onclick="cambioFlecha('boton<?php echo e($Gamer->id); ?>', 'flecha<?php echo e($Gamer->id); ?>')" id="boton<?php echo e($Gamer->id); ?>">
                        <img src="<?php echo e($Gamer->background_image); ?>" alt="foto de <?php echo e($Gamer->name); ?>" class="imagenes_peque"> 
                        <?php echo e($Gamer->name); ?>

                        <i class="fas fa-angle-down" id="flecha<?php echo e($Gamer->id); ?>"></i>
                        
                      </button>
                      
                      <?php $__currentLoopData = $Usersgame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Usergame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if( $Usergame->idgames == $Gamer->id && $Usergame->idusers == Auth::user()->id ): ?>
                          <?php ($true=1); ?>
                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php if($true == 1): ?>
                          <a href="borrar/<?php echo e($Gamer->id); ?>"><i class="fas fa-minus-circle eliminar"></i></a>
                        <?php else: ?>
                        <a href="guardar/<?php echo e($Gamer->id); ?>"><i class="fas fa-plus-circle add"></i></a>
                        <?php endif; ?>

                      
                      
                      
                      
                      
                      
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
                      <a href="comentarios/<?php echo e($Gamer->id); ?>" class="comments"><i class="far fa-comments"></i>   Comentarios</a>
                    </div>
                    
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="paginacion" style="margin-top: 15px;">
                  <?php echo e($Game->links()); ?>

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
                  url:"<?php echo e(route('all.fetch')); ?>",
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




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/all.blade.php ENDPATH**/ ?>