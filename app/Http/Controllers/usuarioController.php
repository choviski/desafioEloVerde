<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Namshi\JOSE\Signer\SecLib\RS384;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $erro=session()->get("erro");
        return view("usuario.create")->with(["erro"=>$erro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios=User::all();
        foreach ($usuarios as $usuario){
            $erro=$request->session()->flash("erro","Já ha um usuário cadastrado com esse e-mail, por favor tente usar outro e-mail");
            if($usuario->email==$request->email){
                return redirect()->back();
            }
        }
        $usuario= new User();
        $usuario->name=$request->nome;
        $usuario->email=$request->email;
        $usuario->password=$request->senha;
        $usuario->save();
        $request->session()->flash("criado","Usuario cadastrado com sucesso!");
        $criado =$request->session()->get("criado");
        return view("welcome")->with(["criado"=>$criado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $Usuario= User::where('email','=',$request->login)->get();
        if(!$Usuario->isEmpty()){
            $Usuario=$Usuario[0];
            if ($Usuario->password==$request->senha){
                $request->session()->put("Usuario",$Usuario);

                return redirect()->route("listarCliente");
            }
            $request->session()->flash("mensagem","Usuario ou senha incorretos");
            $mensagem=$request->session()->get("mensagem");
            return view("welcome")->with(["mensagem"=>$mensagem]);
        }
        $request->session()->flash("mensagem","Usuario não cadastrado");
        $mensagem=$request->session()->get("mensagem");
        return view("welcome")->with(["mensagem"=>$mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $usuario=$request->session()->get("Usuario");
        return view("usuario.edit")->with(["usuario"=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $usuario=User::find($request->id);
        $usuario->name=$request->nome;
        $usuario->password=$request->senha;
        $usuario->save();
        $request->session()->put("Usuario",$usuario);
        return redirect()->route("listarCliente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sair(Request $request){
        $request->session()->flush();
        return redirect()->route("welcome");
    }
}
