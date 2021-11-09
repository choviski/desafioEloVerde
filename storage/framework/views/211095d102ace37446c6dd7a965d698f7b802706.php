<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script> var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
</script>
<?php $__env->startSection('content'); ?>

    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Edidar dados do cliente <?php echo e($cliente->nome); ?>:</p>
        <?php if(!empty($erro)): ?>
            <div class="alert alert-danger mt-2">
                <?php echo e($erro); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="<?php echo e(route("salvarCliente")); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="<?php echo e($cliente->id); ?>" name="id">
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="<?php echo e($cliente->nome); ?>" name="nome" required>

                <label  for="cpf">CPF ou CNPJ:</label>
                <input type="text" class="form-control cpfOuCnpj" id="cpf" value="<?php echo e($cliente->cpf); ?>" name="cpf" required disabled>

                <label  for="telefone">Telefones:</label>
                <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden"  size="10" maxlength="9" class="form-control cep"  value="<?php echo e($telefone->id); ?>" name="id_telefone[]" required>
                        <input type="text" class="form-control mt-2 telefone" value="<?php echo e($telefone->numero); ?>" name="telefone[]" required>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php $__currentLoopData = $enderecos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endereco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
                            <hr>
                            <p class="lead"><?php if($endereco->principal==0): ?> Endereço alternativo <?php else: ?> Endereço principal <?php endif; ?></p>
                        </div>
                        <div class="form-group bg-light p-2 rounded">
                        <label  for="cep">CEP:</label>
                        <input type="text"  size="10" maxlength="9" class="form-control cep"  value="<?php echo e($endereco->cep); ?>" name="cep[]" required>

                        <input type="hidden"  size="10" maxlength="9" class="form-control cep"  value="<?php echo e($endereco->id); ?>" name="id_endereco[]" required>

                        <label  for="rua">Rua:</label>
                        <input type="text" class="form-control" id="rua" value="<?php echo e($endereco->rua); ?>" name="rua[]" required>

                        <label  for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" value="<?php echo e($endereco->bairro); ?>" name="bairro[]" required>

                        <label  for="numero">Número:</label>
                        <input type="number" class="form-control" id="numero" value="<?php echo e($endereco->numero); ?>" name="numero[]" required>

                        <label  for="complemento">Complemento:</label>
                        <input type="text" class="form-control" id="complemento" value="<?php echo e($endereco->complemento); ?>" name="complemento[]">

                        <label for="id_cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" value="<?php echo e($endereco->cidade); ?>" name="cidade[]">

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <input type="submit" class="btn btn-outline-success mt-3 col-12">
                </div>
            </div>
        </form>
        <a href="<?php echo e(route("listarCliente")); ?>"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
    <script>
        $(document).ready(function(){
            $(".telefone").mask('(99) 9 9999-9999');
            $(".cep").mask('00.000-000');

        });
    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('../../layouts/padrao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/cliente/edit.blade.php ENDPATH**/ ?>