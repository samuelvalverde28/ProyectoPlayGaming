<!-- Modal -->
<div class="modal fade" id="modal_nuevoJuego" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="post" action="<?php echo e(route('nuevoJuego')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputname4">Nombre</label>
                    <input type="text" class="form-control" id="inputname4" name="name">
                  </div>
                  <div class="form-group col-md-6">
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
                    <input type="number" class="form-control" id="inputrating4" name="rating">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label for="inputratingtop4">Nota Maxima</label>
                    <input type="number" class="form-control" id="inputratingtop4" name="rating_top">
                  </div>

                  <div class="form-group col-md-3">
                    <label for="inputid4">ID</label>
                    <input type="number" class="form-control" id="inputid4" name="id">
                  </div>
                </div>

                <div>
                  <p>Plataformas</p> 
                  <?php $__currentLoopData = $Platform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo e($plat->id); ?>" name="<?php echo e($plat->id); ?>" value="<?php echo e($plat->id); ?>" >
                      <label class="form-check-label" for="inlineCheckbox<?php echo e($plat->id); ?>" ><?php echo e($plat->name); ?></label>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                    
              </div>
                
                <button type="submit" class="btn btn-primary derecha">Añadir</button>
                <a href=" <?php echo e(route('cancelarConfigJuego')); ?> " class="btn btn-danger derecha espacioentrebotonesderecho">Cancelar</a>
              </form>

        </div>
        <div class="modal-footer">
          
          
          
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminJuegos/modal_nuevoJuego.blade.php ENDPATH**/ ?>