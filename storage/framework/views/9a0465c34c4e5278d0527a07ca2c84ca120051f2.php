<?php $__env->startSection('content'); ?>

    <style>
        @media  only screen and (max-width: 650px) {
            .clienteCard {
                flex-direction: column;
            }

        }
        .nomeCliente{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        .formDelBtn{
            position: relative;
            transition: 0.3s ease;
        }
        .delBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-25px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }
        .delBtn:hover{
            background-color: #d92b2b;
            color: white;
        }
        .delBtn:hover{
            background-color: #d92b2b;
        }
        .formEditBtn{
            position: relative;
        }
        .editBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-25px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;
        }
        .editBtn:hover{
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }



    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">CLIENTES:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10  p-0 rounded-bottom mb-2">



        <div id="dadosCliente">
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <!-- Aqui começa a listagem dos clientes-->
                <div class="warpClienteCard popibg-white shadow-sm">
                    <div class="formDelBtn">
                        <form method="post" action="<?php echo e(route("deletarCliente")); ?>" onsubmit="return confirm('Tem certeza que deseja excluir o cliente <?php echo e($cliente->nome); ?> ?')">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($cliente->id); ?>" name="id">
                            <button class="delBtn"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    <div class="formEditBtn">
                        <form method="post" action="<?php echo e(route("editarCliente")); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($cliente->id); ?>" name="id">
                            <button class="editBtn"><i class="fas fa-pen"></i></button>
                        </form>
                    </div>
                    <div class="warpClienteCard bg-white rounded" >
                        <div id="cCard" class="col-12 bg-white rounded d-flex justify-content-between mt-4 font-size clienteCard">
                            <div id="infoCliente" class="p-2 mt-1 d-flex justify-content-end flex-column ">
                                <img id="imgCliente" class="rounded-circle border" src="<?php echo e(asset("$cliente->foto")); ?>" onerror="this.onerror=null;this.src='<?php echo e(asset("imagens/cliente_default.png")); ?>';" height="125 px" width="125px">
                                <p class="nomeCliente mt-2 border col-12" style="cursor: pointer" id="showInfo" onclick="popUp(<?php echo e($cliente->id); ?>)"><?php echo e($cliente->nome); ?></p>
                            </div>

                        </div>
                        <div class="col-12 clienteCardInfo"  style="display:none;animation: fadeIn ease 0.5s"  id="info<?php echo e($cliente->id); ?>">
                            <hr class="mb-1 mt-1">
                            <form class="form-group ">
                                <input type="text" class="rounded col-12 mb-1" disabled value="Telefone <?php echo e($cliente->telefone->numero); ?>">
                                <input type="text" class="rounded col-12 mb-1" disabled value="Rua: <?php echo e($cliente->endereco->rua); ?>, nº<?php echo e($cliente->endereco->numero); ?> | <?php echo e($cliente->endereco->bairro); ?>, <?php echo e($cliente->endereco->cidade); ?>">
                                <input type="text" class="rounded col-12 mb-3" disabled value="CPF/CNPJ: <?php echo e($cliente->cpf); ?>">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Aqui acaba a listagem dos clientes-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"
>
</script>
<script>
    function popUp(id){
        console.log(id);
        if($('#info'+id).css("display")=='block'){
            $('#info'+id).css("display","none")
        }else{
            $('#info'+id).css("display","block")
        }
    }
</script>

<?php echo $__env->make('../../layouts/padrao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nicho\OneDrive\Área de Trabalho\pogramas\PHP\estagio\resources\views/cliente/index.blade.php ENDPATH**/ ?>