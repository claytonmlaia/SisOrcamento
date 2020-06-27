<?php

namespace App\Http\Controllers;

use App\Situacao;
use Illuminate\Http\Request;

class SituacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $situacao = Situacao::select()->paginate(25);
        return view('situacao',compact('situacao'));
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
