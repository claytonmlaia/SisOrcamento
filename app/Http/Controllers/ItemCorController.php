<?php

namespace App\Http\Controllers;

use App\ItemCor;
use Illuminate\Http\Request;

class ItemCorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cores = ItemCor::select()->paginate(10);
        return view('item_cor',compact('cores'));
    }

    public function cadastrar()
    {
        $cores = ItemCor::select()->get();
        return view('create_cor',compact('cores'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $cadastrar = new ItemCor();
        $cadastrar->corDescricao = $request->cor;
        $cadastrar->corPreco = $request->preco_cor;
        $cadastrar->save();

        $msg = flash(__('msgOrcamento.cor.cadastrar.sucesso'))->success();
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
