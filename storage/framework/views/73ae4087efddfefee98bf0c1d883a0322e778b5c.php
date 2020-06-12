<?php $__env->startSection('content'); ?>




<div class="container ">
  
    <div class="">
        <div class="col-md-12 " style="color: white">


            
        <form class="form-inline" action="agregarImagen/<?php echo e($ID); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group col-md-8">
              
              <input type="URL" class="form-control col-md-12" id="inputPassword2" placeholder="URL" name="img">
            </div>


            <button type="submit" class="btn btn-primary col-md-2">Añadir Imagen</button>
            <a href="/configImagenes/<?php echo e($ID); ?>" class="btn btn-danger col-md-2">Cancelar</a>
          </form>   

            



        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminImagenes/nuevaImagen.blade.php ENDPATH**/ ?>