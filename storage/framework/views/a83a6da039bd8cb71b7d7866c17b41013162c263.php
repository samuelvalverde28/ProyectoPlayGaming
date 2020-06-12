<?php $__env->startSection('content'); ?>




<div class="container ">
  
    <div class="">
        <div class="col-md-12 " style="color: white">


            <?php $__currentLoopData = $Usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                

                <form action="actualizarUsuario/<?php echo e($us->id); ?>" method="POST"  >
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo e($us->name); ?>" name="name">
                        </div>
    
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo e($us->email); ?>" name="email">
                          </div>
    
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Example select</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="rol">
                              <?php switch($us->role):
                                  case (''): ?>
                                    <option selected></option>
                                    <option>admin</option>
                                      <?php break; ?>
                                  <?php case ('admin'): ?>
                                    <option></option>
                                    <option selected>admin</option>
                                      <?php break; ?>
                                  <?php default: ?>
                                      
                              <?php endswitch; ?>
                            
                          </select>
                        </div>
                        <button type="submit" class="btn btn-per derecha">Enviar</button>
                        <a href=" <?php echo e(route('cancelarConfigUsuario')); ?> " class="btn btn-danger derecha espacioentrebotonesderecho">Cancelar</a>
                        
                </form>




            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            

            



        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/admin/actualizar.blade.php ENDPATH**/ ?>