<!-- Modal -->
<div class="modal fade" id="modal_eliminarJuego<?php echo e($game->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estas seguro que deseas eliminar el Juego <strong><?php echo e($game->name); ?></strong> con ID: <?php echo e($game->id); ?>? 
        </div>
        <div class="modal-footer">
          
          <a href="borrarJuegos/<?php echo e($game->id); ?>" class="btn btn-primary">Eliminar</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/adminJuegos/modal_eliminarJuego.blade.php ENDPATH**/ ?>