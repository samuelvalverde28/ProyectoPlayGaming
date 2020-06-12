<?php
use App\Platform;
?>


<?php $__env->startSection('content'); ?>
<div class="container">
  
    <div class="">
        <div class="col-md-12">


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



            <h3 class="paginacion tituloconfigJuegos">Juegos</h3> 

            <a href=" <?php echo e(route('configJuegos')); ?>" class="btn btn-primary float-left col-md-3" style="margin-left: 15px;" data-toggle="modal" data-target="#modal_nuevoJuego">Añadir Juego</a>
            <?php echo $__env->make('adminJuegos.modal_nuevoJuego', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <nav class="navbar navbar-light float-right">
                <form class="form-inline">
                  <a href=" <?php echo e(route('configJuegos')); ?>" class="btn btn-success espacioentrebotonesderecho"><i class="fas fa-redo"></i></a>
                  <input name="buscarjuegos" class="form-control mr-sm-2" type="search" placeholder="Buscar nombres de juegos" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>

            <div class="table-responsive">
                <table class="table table-striped table-dark" style="color: white; font-size: 16px;">
                    <thead>
                    <tr>
                        <th scope="col" class="estatico">#</th>
                        <th scope="col" class="first-col">Name</th>
                        <th scope="col">released</th>
                        <th scope="col">background_image</th>
                        <th scope="col">rating</th>
                        <th scope="col">rating_top</th>
                        <th scope="col">clip</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Plataformas</th>
                        <th scope="col">Imagenes</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $Game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                            <tr>
                                <th scope="row" class="estatico"><?php echo e($game->id); ?></th>
                                <td class="first-col"><?php echo e($game->name); ?></td>
                                <td><?php echo e($game->released); ?></td>
                                <td> <img src="<?php echo e($game->background_image); ?>" alt="<?php echo e($game->name); ?>" class="imagenes_peque"> </td>
                                <td><?php echo e($game->rating); ?></td>
                                <td><?php echo e($game->rating_top); ?></td>
                                <td><?php echo e($game->clip); ?></td>
                                <td class="center"><a href=" <?php echo e(route('configJuegos')); ?> " data-toggle="modal" data-target="#modal_eliminarJuego<?php echo e($game->id); ?>"><i class="fas fa-trash-alt"></i></a></td>
                                <td class="center"><a href="actualizarJue/<?php echo e($game->id); ?>"><i class="fas fa-user-edit"></i></a></td>
                                <td>
                                  
                                    <?php $__currentLoopData = $GamesPlatform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                     
                                            <?php if( $gp->idgames == $game->id): ?>
                                              <?php echo e(Platform::where('id', $gp->idplatforms)->first()->name); ?>

                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                    

                                </td>
                                <td class="center"><a href="configImagenes/<?php echo e($game->id); ?> "><i class="far fa-images"></i></a></td>
                            </tr>
                            <?php echo $__env->make('adminJuegos.modal_eliminarJuego', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('adminJuegos.modal_modificarJuego', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                    
                    </tbody>
                </table>


                
                

            </div>

            <div class="paginacion" >
                <?php echo e($Game->links()); ?>

            </div>
            

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/admin/configJuegos.blade.php ENDPATH**/ ?>