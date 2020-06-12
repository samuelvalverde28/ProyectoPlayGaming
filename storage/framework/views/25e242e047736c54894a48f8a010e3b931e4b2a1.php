<?php $__env->startSection('content'); ?>
<div class="container">
  <ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
      <a class="nav-link " href=" <?php echo e(route('catalogo')); ?> ">Todos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href=" <?php echo e(route('jugando')); ?> ">Jugando</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="<?php echo e(route('completado')); ?>">Completado</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href=" <?php echo e(route('espera')); ?> ">Espera</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href=" <?php echo e(route('dejado')); ?> ">Dejado</a>
    </li>
  </ul>
 


    <div class="">

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

                <?php $__currentLoopData = $Usersgame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Usergame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <?php if($Usergame->idusers == Auth::user()->id): ?>

                    <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Gamer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                      <?php if($Gamer->id == $Usergame->idgames && $Usergame->estado == 'dejado'): ?>
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


                                <img src="<?php echo e($Gamer->background_image); ?>" alt="foto de <?php echo e($Gamer->name); ?>" class="imagenes_peque" style="border: 3px solid <?php echo e($state); ?> ;"> 
                                <?php echo e($Gamer->name); ?>

                                <i class="fas fa-angle-down" id="flecha<?php echo e($Gamer->id); ?>"></i>
                                
                              </button>

                              
                              <a href="<?php echo e(route('borrar', $Gamer->id)); ?>"><i class="fas fa-minus-circle eliminar"></i></a>
                              <a href=" <?php echo e(route('catalogo')); ?> " data-toggle="modal" data-target="#modal_modificar<?php echo e($Gamer->id); ?>"><i class="far fa-edit modificar"></i></a>
                              <?php echo $__env->make('cliente.modal_modificar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              
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
        
        
                            
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>

                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      
                  <?php endif; ?>




                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                


                
              </div>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/dejado.blade.php ENDPATH**/ ?>