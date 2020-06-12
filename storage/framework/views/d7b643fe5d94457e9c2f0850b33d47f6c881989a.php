<?php $__env->startSection('content'); ?>

<div class="container">
  
    <div class=" ">
        <div class="col-md-12">


        <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $games): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e($games->background_image); ?>" alt="<?php echo e($games->id); ?>" width="100%" class="centradoImagen">
            <div class="centrado tituloComentarios">
                <?php echo e($games->name); ?>

            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        <div class="centrado p-2">
            <a href="<?php echo e(route('nuevoComentario')); ?>" class="btn btn-info " style="margin-bottom: 5px;" data-toggle="modal" data-target="#modal_nuevoComentario">Nuevo Comentario</a>
        </div>

        <?php echo $__env->make('cliente.modal_nuevoComentario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
         

         <div id="comentarios">

            <div class="media fondonavbar tituloComentarios centrado">
                <span class="centrado">
            <?php
            if($commentsCount == 0){
                echo('No hay comentarios');
            }    
            ?>
                </span>
            </div>
            
        
        
        
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media fondonavbar p-1 m-1">
                        <img src="<?php echo e($comment->imgProfile); ?>" class="mr-3" alt="usuario" width="50px">
                        <div class="media-body">
                        <h5 class="mt-0"><?php echo e($comment->name); ?></h5>
                        <div class="romper"><?php echo e($comment->comentario); ?></div>
                        
                        <br>
                        <?php echo e($comment->created_at); ?>

        
        
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $games): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                            <?php
                            if(Auth::user()->id == $comment->idusers){
                                echo('
                                <a href="borrarComentario/'.
                                    $comment->id.'/'.   
                                    $games->id    
                                    .'">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                ');
                            }
                        ?>
        
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                        
        
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                <?php echo e($comments->links()); ?>

        
            </div> 

        

         
         



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/comentarios.blade.php ENDPATH**/ ?>