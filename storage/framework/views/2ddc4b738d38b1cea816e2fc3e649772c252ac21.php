<?php $__env->startSection('content'); ?>
<div class="container">
  <?php echo $__env->make('cliente.modal_eliminar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">

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
                <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0  respon">
                    
                      <button class="btn btn-link respon" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($Game->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($Game->id); ?>" onclick="cambioFlecha('boton<?php echo e($Game->id); ?>', 'flecha<?php echo e($Game->id); ?>')" id="boton<?php echo e($Game->id); ?>">
                        <img src="<?php echo e($Game->background_image); ?>" alt="foto de <?php echo e($Game->name); ?>" class="imagenes_peque"> 
                        <?php echo e($Game->name); ?>

                        <i class="fas fa-angle-down" id="flecha<?php echo e($Game->id); ?>"></i>
                        
                      </button>
                      <!-- <a href="<?php echo e(route('all')); ?>" data-toggle="modal" data-target="#modal_eliminar"><i class="fas fa-minus-circle eliminar"></i></a> -->

                      <!-- <form action="<?php echo e(route('guardar', $Game->id)); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <button type="submit"><i class="fas fa-plus-circle add"></i></button>
                      </form> -->
                      
                      <a href="<?php echo e(route('guardar', '$Game->id')); ?>"><i class="fas fa-plus-circle add"></i></a>
                      
                      
                    </h2>
                  </div>
              
                  <div id="collapse<?php echo e($Game->id); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                      <div>
                        <h2 style="text-align: center;"><?php echo e($Game->name); ?></h2>
                        <p style="text-align: center;">Fecha de Lanazamiento: <?php echo e($Game->released); ?></p>
                        <p style="text-align: center;">Nota: <?php echo e($Game->rating); ?>/<?php echo e($Game->rating_top); ?></p>
                         
                      </div>

                      <div class="listas">
                        <ul class="ul_dis">
                        <?php $__currentLoopData = $GamesPlatform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gamesPlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($gamesPlat->idgames == $Game->id): ?>
                          
                          
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
                        
                      

                      <div id="carouselExampleIndicators<?php echo e($Game->id); ?>" class="carousel slide carouselpersonalizado" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <?php for($i = 0; $i < 7; $i++): ?>

                          <?php if($i == 0): ?>
                          <li data-target="#carouselExampleIndicators<?php echo e($Game->id); ?>" data-slide-to="0" class="active"></li>
                          <?php else: ?>
                          <li data-target="#carouselExampleIndicators<?php echo e($Game->id); ?>" data-slide-to="<?php echo e($i); ?>"></li>
                          <?php endif; ?>

                          
                          <?php endfor; ?>
                        </ol>

                        <div class="carousel-inner">
                        <?php ($number = 0); ?>
                        <?php $__currentLoopData = $Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($image->idgames == $Game->id): ?>
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
                        <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo e($Game->id); ?>" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo e($Game->id); ?>" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>




                      <!-- fin carrousel -->

                      <!-- video -->
                      <div class="embed-responsive embed-responsive-16by9 clip">
                        <video src="<?php echo e($Game->clip); ?>" controls muted preload="auto"></video>
                      </div>
                      <!-- fin video -->
                    

                    </div>


                    
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                
              </div>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\playgaming\resources\views/all.blade.php ENDPATH**/ ?>