<?php

namespace App\Http\Controllers;

use App\ItemTipo;
use Illuminate\Http\Request;

class ItemTipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipos = ItemTipo::select()->paginate(10);
        //dd($tipos);
        return view('item_tipo',compact('tipos'));
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
