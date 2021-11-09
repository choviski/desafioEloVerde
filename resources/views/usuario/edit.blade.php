@extends(".layouts.padrao")


@section('content')

    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Perfil Usuario:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form action="{{route("editarUsuario")}}" method="post" class="form-group ">
            @csrf

            <div class="form-group bg-light p-2 rounded">

                <input type="hidden" value="{{$usuario->id}}" name="id">
            <input type="text" name="nome" class="form-control mt-2" value="{{$usuario->name}}" required>
            <input type="email" name="email" class="form-control mt-2" value="{{$usuario->email}}" required disabled>
            <input type="text" name="senha" class="form-control mt-2" value="{{$usuario->password}}" required>
            <input type="submit" value="Alterar" class="btn-block btn-outline-success rounded mt-2">
            </div>

        </form>
        <a href="{{route("listarCliente")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>

    </div>
@endsection
