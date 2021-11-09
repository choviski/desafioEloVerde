<?php $__env->startSection('content'); ?>

    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Perfil Usuario:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form action="<?php echo e(route("editarUsuario")); ?>" method="post" class="form-group ">
            <?php echo csrf_field(); ?>

            <div class="form-group bg-light p-2 rounded">

                <input type="hidden" value="<?php echo e($usuario->id); ?>" name="id">
            <input type="text" name="nome" class="form-control mt-2" value="<?php echo e($usuario->name); ?>" required>
            <input type="email" name="email" class="form-control mt-2" value="<?php echo e($usuario->email); ?>" required disabled>
            <input type="text" name="senha" class="form-control mt-2" value="<?php echo e($usuario->password); ?>" required>
            <input type="submit" value="Alterar" class="btn-block btn-outline-success rounded mt-2">
            </div>

        </form>
        <a href="<?php echo e(route("listarCliente")); ?>"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(".layouts.padrao", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/usuario/edit.blade.php ENDPATH**/ ?>