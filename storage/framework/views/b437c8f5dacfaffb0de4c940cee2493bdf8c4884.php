<?php $__env->startSection('content'); ?>

    <div class=" p-2 bg-light rounded shadow text-center mt-2">
        <form action="<?php echo e(route("cadastroUsuario")); ?>" method="post" class="form-group ">
            <?php echo csrf_field(); ?>
            <?php if(!empty($erro)): ?>
                <div class="alert alert-danger mt-2">
                    <?php echo e($erro); ?>

                </div>
            <?php endif; ?>

            <input type="text" name="nome" class="form-control mt-2" placeholder="Nome" required>
            <input type="email" name="email" class="form-control mt-2" placeholder="E-mail" required>
            <input type="password" name="senha" class="form-control mt-2" placeholder="Senha" required>
            <input type="submit" value="Cadastrar" class="btn-block btn-outline-success rounded mt-2">

        </form>
        <a href="<?php echo e(route("welcome")); ?>" style="text-decoration: none">Voltar</a>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(".layouts.iniciais", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/usuario/create.blade.php ENDPATH**/ ?>