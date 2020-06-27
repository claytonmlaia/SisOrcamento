<?php

namespace App\Http\Controllers;

use App\Item;
use App\Orcamento;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // MOSTRA NA TELA INICIAL DE ORÇAMENTO, LISTA DE ORÇAMENTOS
        $orcamentos = Orcamento::select()->orderBy('id','desc')->paginate(10);
        $valororcamento = Item::get();
        return view('orcamentos',compact('orcamentos','valororcamento'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        // MOSTRA ORÇAMENTO DETALHADO, UM POR PÁGINA, QUANDO CLICA EM VISUALIZAR ORÇAMENTO
        $orcamentos = Orcamento::select()->where('id',$id)->get();
        $itemorcamentos = Item::where('orcamento_id',$id)->get();
        return view('visualiza_orcamento',compact('orcamentos','itemorcamentos'));
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
