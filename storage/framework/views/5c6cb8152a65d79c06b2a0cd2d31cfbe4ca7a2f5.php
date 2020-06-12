<!-- Modal -->
<div class="modal fade" id="modal_modificarImagenProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form method="POST" action="<?php echo e(route('modificarImagenProfile')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Añada la URL de su imagen</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="img">
                    
                  </div>
                

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-per">Registrar</button>

                    </div>
                </div>

            </form>

        </div>
        <div class="modal-footer">
          
          
          
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/modal_modificarImagenProfile.blade.php ENDPATH**/ ?>