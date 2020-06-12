<?php $__env->startSection('content'); ?>




<div class="container ">
  
    <div class="">
        <div class="col-md-12 " style="color: white">

            <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form method="post" action="actualizarJuego/<?php echo e($game->id); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="inputname4">Nombre</label>
                    <input type="text" class="form-control" id="inputname4" name="name" placeholder="<?php echo e($game->name); ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputreleased4">Fecha de Lanzamiento</label>
                    <input type="date" class="form-control" id="inputreleased4" name="released">
                  </div>
                </div>
                <div class="form-group">
                  <label for="imagenfondo4">Imagen de portada</label>
                  <input type="url" class="form-control" id="imagenfondo4" placeholder="URL imagen" name="background_image">
                </div>
                <div class="form-group">
                  <label for="clip4">Clip</label>
                  <input type="url" class="form-control" id="clip4" placeholder="URL clip" name="clip">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputrating4">Nota</label>
                    <input type="number" class="form-control" id="inputrating4" name="rating" placeholder="<?php echo e($game->rating); ?>">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label for="inputratingtop4">Nota Maxima</label>
                    <input type="number" class="form-control" id="inputratingtop4" name="rating_top" placeholder="<?php echo e($game->rating_top); ?>">
                  </div>

                  <div class="form-group col-md-3">
                    <label for="inputid4">ID</label>
                    <input type="number" class="form-control" id="inputid4" name="id" placeholder="<?php echo e($game->id); ?>" disabled>
                  </div>
                </div>

                <div>
                    <p>Plataformas</p> 
                    <?php $__currentLoopData = $Platform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo e($plat->id); ?>" name="<?php echo e($plat->id); ?>" value="<?php echo e($plat->id); ?>" <?php $__currentLoopData = $GamePlatform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($gp->idplatforms == $plat->id && $gp->idgames == $game->id): ?>
                                checked
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                        <label class="form-check-label" for="inlineCheckbox<?php echo e($plat->id); ?>" ><?php echo e($plat->name); ?></label>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                      
                </div>
                
                <button type="submit" class="btn btn-primary derecha">Modificar</button>
                <a href=" <?php echo e(route('cancelarConfigJuego')); ?> " class="btn btn-danger derecha espacioentrebotonesderecho">Cancelar</a>
              </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            


        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminJuegos/actualizarJue.blade.php ENDPATH**/ ?>