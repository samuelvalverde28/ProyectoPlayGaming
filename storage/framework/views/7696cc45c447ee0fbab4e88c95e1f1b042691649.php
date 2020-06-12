<!-- Modal -->
<div class="modal fade" id="#modal_eliminar<?php echo e($imagen->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estas seguro que deseas eliminar la Imagen <strong><?php echo e($imagen->img); ?></strong> con ID: <?php echo e($imagen->id); ?>? 
        </div>
        <div class="modal-footer">
          
          <a href="" class="btn btn-primary">Eliminar</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminImagenes/modal_eliminar.blade.php ENDPATH**/ ?>