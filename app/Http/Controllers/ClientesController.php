<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\ClienteTipo;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipocliente = ClienteTipo::select()->get();
        $clientes = Clientes::select()->orderBy('id','desc')->paginate(10);
        return view('clientes',compact('tipocliente','clientes'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cadastrar = new Clientes();
        $cadastrar->nome_cliente_responsavel    = $request->cliente_responsavel;
        $cadastrar->cpf                         = $request->cpf;
        $cadastrar->celular                     = $request->celular;
        $cadastrar->email                       = $request->email;
        $cadastrar->cliente_tipo_id             = $request->tipo_cliente;
        $cadastrar->cnpj                        = $request->cnpj;
        $cadastrar->razao_social                = $request->razao_social;
        $cadastrar->inscricao_estadual          = $request->inscricao_estadual;
        $cadastrar->inscricao_municipal         = $request->inscricao_municioal;
        $cadastrar->telefone_contato            = $request->telefone_comercial;
        $cadastrar->cep                         = $request->cep;
        $cadastrar->endereco                    = $request->endereco;
        $cadastrar->complemento                 = $request->complemento;
        $cadastrar->observacao                  = $request->observacao;
        $cadastrar->nome_fantasia               = $request->nome_fantasia;
        $cadastrar->save();

        $msg = flash(__('msgOrcamento.cliente.cadastrar.sucesso'))->success();
        return redirect()->action('EditaClientes@index')->with('msgProcesso', $msg);

    }

    public function show($id)
    {
        //
    }

    // ABRE FORMULARIO EDITAR CLIENTE
    public function edit($id)
    {
        $tipocliente = ClienteTipo::select()->get();
        $clientes = Clientes::select()->where('id',$id)->get();
        return view('edita_cliente',compact('clientes','tipocliente'));
    }


    // ABRE FORMULARIO CADASTRAR CLIENTES
    public function cadastrar()
    {
        $tipocliente = ClienteTipo::select()->get();
        $clientes = Clientes::select()->get();
        return view('create_cliente',compact('clientes','tipocliente'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function visualiza($id)
    {
        $tipocliente = ClienteTipo::select()->get();
        $clientes = Clientes::select()->where('id',$id)->get();
        return view('visualiza_cliente',compact('clientes','tipocliente'));
    }
}
