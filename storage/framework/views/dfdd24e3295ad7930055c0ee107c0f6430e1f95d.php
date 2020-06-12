<?php $__env->startSection('content'); ?>

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">

         
            <div class="media fondonavbar centrado textoCorreo">
                <span class="centrado textoCorreo2">
                    Buscar personas mediante Correo:
                </span>

                <nav class="navbar navbar-light  ">
                    <form class="form-inline">
                      <a href=" <?php echo e(route('follower')); ?>" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>
                      <input name="buscarfollower" class="form-control mr-sm-2" type="search" placeholder="Buscar correo" aria-label="Search">
                      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                  </nav>    



            </div>


            <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="">

                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo e($usuarios->imgProfile); ?>" class="card-img-top" alt="Imagen perfil">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($usuarios->name); ?></h5>
                                <p class="card-text"><?php echo e($usuarios->email); ?></p>
                                
                                <h2 class="respon">
                                    
                                    <?php ($true=0); ?>
                                    
                                    <?php $__currentLoopData = $follow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $followers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    
                                        <?php if( $followers->idfollow == $usuarios->id && $followers->iduser == Auth::user()->id ): ?>
                                            <?php ($true=1); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    

                                <?php if($true == 1): ?>
                                    <a href="borrarFollower/<?php echo e($usuarios->id); ?>"><i class="fas fa-minus-circle eliminar"></i></a>
                                <?php else: ?>
                                    <a href="guardarFollower/<?php echo e($usuarios->id); ?>"><i class="fas fa-plus-circle add"></i></a>
                                <?php endif; ?>

                                </h2>

                                


                            </div>
                          </div>



                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 




                

                <table class="table" >
                    <thead>
                      <tr class="colorBlanco">
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Link</th>
                        <th scope="col">eliminar</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $followInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $followInfos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="colorBlanco">
                                <th scope="row"><?php echo e($followInfos->name); ?></th>
                                <td><?php echo e($followInfos->email); ?></td>
                                <td> <img src="<?php echo e($followInfos->imgProfile); ?>" alt="Imagen perfil" width="50px"> </td>
                                <td><h2><a href="profile/<?php echo e($followInfos->idfollow); ?>"><i class="fas fa-link"></i></a></h2></td>
                                <td> <h2><a href="borrarFollower/<?php echo e($followInfos->idfollow); ?>"><i class="fas fa-minus-circle elimi" ></i></a></h2></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                  </table>

                    
                
            





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/follower.blade.php ENDPATH**/ ?>