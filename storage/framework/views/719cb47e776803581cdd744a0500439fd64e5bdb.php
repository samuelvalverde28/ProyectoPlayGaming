<?php $__env->startSection('content'); ?>
<div class="container">
  <?php echo $__env->make('cliente.modal_eliminar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="">
        <div class="col-md-12">

            <p style="color: white">Usuarios</p> 
            <div class="table-responsive">
                <table class="table table-striped table-dark" style="color: white; font-size: 16px;">
                    <thead>
                    <tr>
                        <th scope="col" style="margin-left: 1px;">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
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
                                <td><?php echo e($us->password); ?></td>
                                <td style="text-align: center;"><i class="fas fa-trash-alt"></i></td>
                                <td style="text-align: center;"><i class="fas fa-user-edit"></i></td>
                            </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        
                    </tbody>
                </table>


            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\playgaming\resources\views/admin/configUsuarios.blade.php ENDPATH**/ ?>