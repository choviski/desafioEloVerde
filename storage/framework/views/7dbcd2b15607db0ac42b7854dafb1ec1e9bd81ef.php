<?php $__env->startSection('content'); ?>
    <div class=" p-2 bg-light rounded shadow text-center mt-3">
        <form action="<?php echo e(route("login")); ?>" method="post" class="form-group ">
            <?php echo csrf_field(); ?>
            <input type="email" name="login" class="form-control mt-2" placeholder="Email" required>
            <input type="password" name="senha" class="form-control mt-2" placeholder="Senha" required>
            <input type="submit" value="Entrar" class="btn-block btn-outline-success rounded shadow mt-2 ">
        </form>
        <a href="<?php echo e(route("novoUsuario")); ?>"><button  class="btn-block btn-outline-success rounded shadow" style="text-decoration: none">Cadastrar-se</button></a>
        <?php if(!empty($mensagem)): ?>
            <div class="alert alert-danger mt-2">
                <?php echo e($mensagem); ?>

            </div>
        <?php endif; ?>
        <?php if(!empty($criado)): ?>
            <div class="alert alert-success mt-2">
                <?php echo e($criado); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('/layouts/iniciais', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/welcome.blade.php ENDPATH**/ ?>