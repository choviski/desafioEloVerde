@extends('../../layouts/padrao')
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
@section('content')

    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Edidar dados do cliente {{$cliente->nome}}:</p>
        @if(!empty($erro))
            <div class="alert alert-danger mt-2">
                {{$erro}}
            </div>
        @endif
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{route("salvarCliente")}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$cliente->id}}" name="id">
            <div class="form-group bg-light p-2 rounded">
                <label  for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" value="{{$cliente->nome}}" name="nome" required>

                <label  for="cpf">CPF ou CNPJ:</label>
                <input type="text" class="form-control cpfOuCnpj" id="cpf" value="{{$cliente->cpf}}" name="cpf" required disabled>

                <label  for="telefone">Telefones:</label>
                @foreach($telefones as $telefone)
                        <input type="hidden"  size="10" maxlength="9" class="form-control cep"  value="{{$telefone->id}}" name="id_telefone[]" required>
                        <input type="text" class="form-control mt-2 telefone" value="{{$telefone->numero}}" name="telefone[]" required>
                    @endforeach


                @foreach($enderecos as $endereco)
                        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
                            <hr>
                            <p class="lead">@if($endereco->principal==0) Endereço alternativo @else Endereço principal @endif</p>
                        </div>
                        <div class="form-group bg-light p-2 rounded">
                        <label  for="cep">CEP:</label>
                        <input type="text"  size="10" maxlength="9" class="form-control cep"  value="{{$endereco->cep}}" name="cep[]" required>

                        <input type="hidden"  size="10" maxlength="9" class="form-control cep"  value="{{$endereco->id}}" name="id_endereco[]" required>

                        <label  for="rua">Rua:</label>
                        <input type="text" class="form-control" id="rua" value="{{$endereco->rua}}" name="rua[]" required>

                        <label  for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" value="{{$endereco->bairro}}" name="bairro[]" required>

                        <label  for="numero">Número:</label>
                        <input type="number" class="form-control" id="numero" value="{{$endereco->numero}}" name="numero[]" required>

                        <label  for="complemento">Complemento:</label>
                        <input type="text" class="form-control" id="complemento" value="{{$endereco->complemento}}" name="complemento[]">

                        <label for="id_cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" value="{{$endereco->cidade}}" name="cidade[]">

                    @endforeach
                    <input type="submit" class="btn btn-outline-success mt-3 col-12">
                </div>
            </div>
        </form>
        <a href="{{route("listarCliente")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>
    <script>
        $(document).ready(function(){
            $(".telefone").mask('(99) 9 9999-9999');
            $(".cep").mask('00.000-000');

        });
    </script>


@endsection


