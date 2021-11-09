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
        <p class="lead">Cadastrar Clientes:</p>
        <?php if(!empty($erro)): ?>
            <div class="alert alert-danger mt-2">
                <?php echo e($erro); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="<?php echo e(route("cadastroCliente")); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Insira o nome do cliente" name="nome" required>

                <label  for="cpf">CPF ou CNPJ:</label>
                <input type="text" class="form-control cpfOuCnpj" id="cpf" placeholder="Insira o CPF ou CNPJ do cliente" name="cpf" required>

                <label  for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" placeholder="Insira a imagem do Cliente" name="foto" accept="image/jpeg,image/x-png,image/jpg">
                <label  for="telefone">Telefone:</label>
                <input type="text" class="form-control telefone" placeholder="Insira o telefone principal" name="telefone[]" required>

                <div class="d-flex justify-content-end" >
                    <button class="btn btn-outline-success col-sm-2 col-md-2 d-flex justify-content-center mt-2"
                            type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="false"
                            aria-controls="faq1" id="add-campo">
                        <i class="mt-1 mr-2 fas fa-plus  fa-1x "> </i>  Adicionar telefone
                    </button>
                </div>

                <div id="formulario-telefone">


                </div>


                <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
                    <hr>
                    <p class="lead">Endereço Principal:</p>
                </div>
                <div class="form-group bg-light p-2 rounded">
                    <label  for="cep">CEP:</label>
                    <input type="text"  size="10" maxlength="9" class="form-control cep"  placeholder="Insira o CEP" name="cep[]" required>

                    <label  for="rua">Rua:</label>
                    <input type="text" class="form-control" id="rua" placeholder="Insira a rua" name="rua[]" required>

                    <label  for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" placeholder="Insira o bairro" name="bairro[]" required>

                    <label  for="numero">Número:</label>
                    <input type="number" class="form-control" id="numero" placeholder="Insira o número" name="numero[]" required>

                    <label  for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" placeholder="Insira o complemento" name="complemento[]">

                    <label for="id_cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Insira a cidade" name="cidade[]">
                <div class="d-flex justify-content-end" >

                    <button class="btn btn-outline-success col-sm-2 col-md-2 d-flex justify-content-center mt-2"
                            type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="false"
                            aria-controls="faq1" id="add-endereco">
                        <i class="mt-1 mr-2 fas fa-plus  fa-1x "> </i>  Adicionar endereco
                    </button>
                </div>

                <div id="formulario-endereco">


                </div>

                <input type="submit" class="btn btn-outline-success mt-3 col-12">
            </div>
            </div>
        </form>
        <a href="<?php echo e(route("listarCliente")); ?>"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
    <script>

        //https://api.jquery.com/click/
        $("#add-campo").click(function () {
            //https://api.jquery.com/append/
            $("#formulario-telefone").append('<label  for="telefone">Telefone :</label> <input type="text" class="form-control telefone" placeholder="Insira outro telefone" name="telefone[]" >');
            $(".telefone").mask('(99) 9 9999-9999');
        });

        $("#add-endereco").click(function () {
            //https://api.jquery.com/append/
            $("#formulario-endereco").append('<div class="col-12 bg-white text-center shadow-sm rounded-bottom"> ' +
                '<hr> ' +
                '<p class="lead">Outro Endereco:</p> ' +
                '</div> ' +
            '<div class="form-group bg-light p-2 rounded"> ' +
                '<label  for="cep">CEP:</label> ' +
            '<input type="text"  size="10" maxlength="9" class="form-control cep" placeholder="Insira o CEP" name="cep[]"> ' +
                '' +
                '<label  for="rua">Rua:</label> ' +
            '<input type="text" class="form-control" id="rua" placeholder="Insira a rua" name="rua[]"> ' +
                '' +
                '<label  for="bairro">Bairro:</label> ' +
            '<input type="text" class="form-control" id="bairro" placeholder="Insira o bairro" name="bairro[]"> ' +
                '' +
                '<label  for="numero">Número:</label> ' +
            '<input type="number" class="form-control" id="numero" placeholder="Insira o número" name="numero[]"> ' +
                '' +
                '<label  for="complemento">Complemento:</label> ' +
            '<input type="text" class="form-control" id="complemento" placeholder="Insira o complemento" name="complemento[]"> ' +
                '' +
                '<label for="id_cidade">Cidade:</label> ' +
                '<input type="text" class="form-control" id="cidade" placeholder="Insira a cidade" name="cidade[]"> ' );
            $(".cep").mask('00.000-000');

        });

        $(document).ready(function(){
            $(".telefone").mask('(99) 9 9999-9999');
            $(".cep").mask('00.000-000');

        });
    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('../../layouts/padrao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/cliente/create.blade.php ENDPATH**/ ?>