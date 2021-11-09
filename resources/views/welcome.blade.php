@extends('/layouts/iniciais')

@section('content')
    <div class=" p-2 bg-light rounded shadow text-center mt-3">
        <form action="{{route("login")}}" method="post" class="form-group ">
            @csrf
            <input type="email" name="login" class="form-control mt-2" placeholder="Email" required>
            <input type="password" name="senha" class="form-control mt-2" placeholder="Senha" required>
            <input type="submit" value="Entrar" class="btn-block btn-outline-success rounded shadow mt-2 ">
        </form>
        <a href="{{route("novoUsuario")}}"><button  class="btn-block btn-outline-success rounded shadow" style="text-decoration: none">Cadastrar-se</button></a>
        @if(!empty($mensagem))
            <div class="alert alert-danger mt-2">
                {{$mensagem}}
            </div>
        @endif
        @if(!empty($criado))
            <div class="alert alert-success mt-2">
                {{$criado}}
            </div>
        @endif
    </div>
@endsection

