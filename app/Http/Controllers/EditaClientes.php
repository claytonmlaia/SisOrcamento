<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;


class EditaClientes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ABRE O ARQUIVO QUE FECHA O FORMULÁRIO POPUP, E VOLTA PARA A PÁGINA ANTERIOR
        return view('aposeditar');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $editarcliente = Clientes::where('id',$request->id)->update([
        'nome_cliente_responsavel'    => $request->cliente_responsavel,
        'cpf'                         => $request->cpf,
        'celular'                     => $request->celular,
        'email'                       => $request->email,
        'cliente_tipo_id'             => $request->tipo_cliente,
        'cnpj'                        => $request->cnpj,
        'razao_social'                => $request->razao_social,
        'inscricao_estadual'          => $request->inscricao_estadual,
        'inscricao_municipal'         => $request->inscricao_municioal,
        'telefone_contato'            => $request->telefone_comercial,
        'cep'                         => $request->cep,
        'endereco'                    => $request->endereco,
        'complemento'                 => $request->complemento,
        'observacao'                  => $request->observacao,
        'nome_fantasia'               => $request->nome_fantasia,
        ]);

        $msg = flash(__('msgOrcamento.cliente.cadastrar.sucesso'))->success();
        return redirect()->action('EditaClientes@index')->with('msgProcesso', $msg);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
