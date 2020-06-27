<?php

namespace App\Http\Controllers;

use App\TipoEstampa;
use Illuminate\Http\Request;

class TipoEstampaController extends Controller
{

    public function index()
    {
        $tipo_estampas = TipoEstampa::select()->paginate(25);
        return view('tipo_estampa',compact('tipo_estampas'));
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
