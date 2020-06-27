<?php

namespace App\Http\Controllers;

use App\ItemAcabamentoExtra;
use Illuminate\Http\Request;

class ItemAcabamentoExtraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $acabamentos = ItemAcabamentoExtra::select()->paginate(10);
        return view('item_acabamento_extra',compact('acabamentos'));
    }


    public function cadastrar()
    {
        return view('create_acabamento_extra');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $cadastrar = new ItemAcabamentoExtra();
        $cadastrar->acbDescricao = $request->acabamento;
        $cadastrar->acbPreco = $request->preco_acabamento;
        $cadastrar->save();

        $msg = flash(__('msgOrcamento.acabamento.cadastrar.sucesso'))->success();
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
