<?php $__env->startSection('content'); ?>
<div class="container">
  
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

            <div class="barraconmargin">
            <a href="/configJuegos" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
            
            <a href="/nuevoImagen/<?php echo e($Image[0]->idgames); ?>" class="btn btn-primary"  >Nueva Imagen</a>
            
            

              
            </div>

            

            <div class="cardImagenes">
              <?php $__currentLoopData = $Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="card" style="width: 360px; ">
                    <img src="<?php echo e($imagen->img); ?>" class="card-img-top" alt="<?php echo e($imagen->id); ?>" style="height:201px;">
                    <div class="card-body">
                      <p class="card-text"><?php echo e($imagen->idgames); ?> / <?php echo e($imagen->id); ?></p>
                      <a href="borrarImagenes/<?php echo e($imagen->id); ?>"><i class="fas fa-trash-alt"></i></a>
                      
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            



           
            

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminImagenes/configImagenes.blade.php ENDPATH**/ ?>