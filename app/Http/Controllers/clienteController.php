<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use File;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();
        $enderecos= Endereco::where("principal","=",1)->get();
        $telefone= Telefone::where("principal","=",1)->get();

        return view("cliente.index")->with(["clientes"=>$clientes,"enderecos"=>$enderecos,"telefones"=>$telefone]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes=Cliente::all();
        $lixoCpf =Cliente::onlyTrashed()->where("cpf","=",$request->cpf)->get();
        if($lixoCpf->isNotEmpty()){
            $request->session()->flash("erro","Já existe um cliente cadastrado com esse CPF.");
            $erro = $request->session()->get("erro");
            return view("cliente.create")->with(["erro"=>$erro]);
        }

        foreach ($clientes as $cliente){
            if($cliente->cpf==$request->cpf){
                $request->session()->flash("erro","Já existe um cliente cadastrado com esse CPF.");
                $erro = $request->session()->get("erro");
                return view("cliente.create")->with(["erro"=>$erro]);

            }
        }
        $cliente = new Cliente();
        $cliente->nome=$request->nome;
        $cliente->cpf=$request->cpf;
        $cliente->save();
        if($request->file('foto')) {
            $imagem = $request->file('foto');
            if($imagem->getClientOriginalExtension()=="JPG"){
                $extensao = "jpg";
            }else {
                $extensao = $imagem->getClientOriginalExtension();
            }
            chmod($imagem->path(), 0755);
            File::move($imagem, public_path() . '/imagem-cliente/cliente-id' . $cliente->id . '.' . $extensao);
            $cliente->foto = '/imagem-cliente/cliente-id' . $cliente->id . '.' . $extensao;
        }else{
            $cliente->foto="imagens/cliente_default.png";
        }
        $cliente->save();

        $telefones=$request->telefone;
        $cont=0;
        foreach ($telefones as $telefone){
            $tel= new Telefone();
            $tel->numero=$telefone;
            $tel->id_cliente=$cliente->id;
            if($cont==0){
                $tel->principal=1;
            }else{
                $tel->principal=0;
            }
            $tel->save();
            $cont=$cont+1;
        }
        $ceps=$request->cep;
        $cont=0;
        foreach ($ceps as $cep){
                $endereco = new Endereco();
                $endereco->cep = $cep;
                $endereco->rua = $request->rua[$cont];
                $endereco->bairro = $request->bairro[$cont];
                $endereco->numero = $request->numero[$cont];
                $endereco->complemento = $request->complemento[$cont];
                $endereco->cidade = $request->cidade[$cont];
                $endereco->id_cliente = $cliente->id;
                    if($cont==0){
                        $endereco->principal=1;
                    }else{
                        $endereco->principal=0;
                    }
                $endereco->save();
                $cont=$cont+1;
        }
        return redirect()->route("listarCliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $cliente=Cliente::find($request->id);
        $telefones=Telefone::where("id_cliente","=",$request->id)->get();
        $enderecos=Endereco::where("id_cliente","=",$request->id)->get();
        return view("cliente.edit")->with(["telefones"=>$telefones,"enderecos"=>$enderecos,"cliente"=>$cliente]);
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
        $cliente=Cliente::find($request->id);
        $cliente->nome=$request->nome;
        $cliente->save();

        $cep=$request->cep;
        $cont=0;
        foreach ($cep as $end){
            $endereco=Endereco::find($request->id_endereco[$cont]);
            $endereco->cep=$end;
            $endereco->rua=$request->rua[$cont];
            $endereco->bairro=$request->bairro[$cont];
            $endereco->numero=$request->numero[$cont];
            $endereco->complemento=$request->complemento[$cont];
            $endereco->cidade=$request->cidade[$cont];
            $endereco->save();
            $cont=$cont+1;
        }
        $telefones = $request->telefone;
        $cont=0;
        foreach ($telefones as $tel){
            $telefone=Telefone::find($request->id_telefone[$cont]);
            $telefone->numero=$tel;
            $telefone->save();
            $cont=$cont+1;
        }

        return redirect()->route("listarCliente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $enderecos=Endereco::where("id_cliente","=",$request->id)->get();
        $telefones=Telefone::where("id_cliente","=",$request->id)->get();
        foreach ($telefones as $telefone){
            Telefone::destroy($telefone->id);
        }
        foreach ($enderecos as $endereco){
            Endereco::destroy($endereco->id);
        }
        Cliente::destroy($request->id);
        return redirect()->route("listarCliente");
    }
}
