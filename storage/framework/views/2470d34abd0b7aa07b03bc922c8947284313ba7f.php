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
                <img src="https://image.flaticon.com/icons/png/512/16/16480.png" class="mr-3" alt="usuario" width="50px">
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

        <?php echo $comments->links(); ?>


    </div> <?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/cliente/comentariosPagination.blade.php ENDPATH**/ ?>