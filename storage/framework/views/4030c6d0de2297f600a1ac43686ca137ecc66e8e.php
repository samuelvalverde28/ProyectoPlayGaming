<!-- Modal -->
<div class="modal fade" id="modal_modificar<?php echo e($Gamer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar estado del juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        <form method="post" action="<?php echo e(route('actualizarEstado', $Gamer->id)); ?>">
            
            <?php echo csrf_field(); ?>
           
            
            <div class="form-group">
            <label for="exampleFormControlSelect1"><?php echo e($Gamer->name); ?></label>
                <select class="form-control" id="exampleFormControlSelect1" name="estad">
                    <?php switch($Usergame->estado):
                        case ('jugando'): ?>
                            <option selected >jugando</option>
                            <option >completado</option>
                            <option >espera</option>
                            <option >dejado</option>
                            <?php break; ?>
                        <?php case ('completado'): ?>
                            <option >jugando</option>
                            <option selected >completado</option>
                            <option >espera</option>
                            <option >dejado</option>
                            <?php break; ?>
                        <?php case ('espera'): ?>
                            <option >jugando</option>
                            <option >completado</option>
                            <option selected >espera</option>
                            <option >dejado</option>
                            <?php break; ?>
                        <?php case ('dejado'): ?>
                            <option >jugando</option>
                            <option >completado</option>
                            <option >espera</option>
                            <option selected >dejado</option>
                            <?php break; ?>
                    
                        
                    <?php endswitch; ?>
                    
                </select>
            </div>
            <a href="<?php echo e(route('cancelarModalCatalogo')); ?>" class="btn btn-secondary derecha">cancelar</a>
            <button type="submit" class="btn btn-primary espacioentrebotonesderecho derecha">Enviar</button>
          </form>

        </div>
        <div class="modal-footer">     
            
            
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/modal_modificar.blade.php ENDPATH**/ ?>