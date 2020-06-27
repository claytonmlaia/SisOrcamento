<?php

namespace App\Http\Controllers\Api;

use App\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcessoExternoController extends Controller
{

    public function index()
    {
        $clientes = Clientes::all();
        return response()->json($clientes);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
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
