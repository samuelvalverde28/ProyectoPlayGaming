<?php $__env->startSection('content'); ?>
<div class="container">
  
    <div class="">
        <div class="col-md-13">

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

            

            <div style="color: white;" class="barra">
              Usuarios
              
              <a href="<?php echo e(route('configUsuarios')); ?>" class="btn btn-info " style="margin-bottom: 5px;" data-toggle="modal" data-target="#modal_nuevoUsuario">Nuevo Usuario</a>
            </div>

            <?php echo $__env->make('admin.modal_nuevoUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive">
                <table class="table table-striped table-dark" style="color: white; font-size: 16px;">
                    <thead>
                    <tr>
                        <th scope="col" style="margin-left: 1px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $User; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                            <tr>
                            <th scope="row"><?php echo e($us->id); ?></th>
                                <td><?php echo e($us->name); ?></td>
                                <td><?php echo e($us->email); ?></td>
                                <td><?php echo e($us->role); ?></td>
                                <td><?php echo e($us->created_at); ?></td>
                                <td style="text-align: center;"><a href=" <?php echo e(route('configUsuarios')); ?> " data-toggle="modal" data-target="#modal_eliminar<?php echo e($us->id); ?>"><i class="fas fa-trash-alt"></i></a></td>
                                <td style="text-align: center;"><a href="actualizar/<?php echo e($us->id); ?>"><i class="fas fa-user-edit"></i></a></td>
                            </tr>
                            <?php echo $__env->make('admin.modal_eliminar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.modal_modificar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        
                    </tbody>
                </table>


            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/admin/configUsuarios.blade.php ENDPATH**/ ?>