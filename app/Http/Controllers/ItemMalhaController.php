<?php

namespace App\Http\Controllers;

use App\ItemMalha;
use Illuminate\Http\Request;

class ItemMalhaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $malhas = ItemMalha::select()->paginate(10);
        return view('item_malha',compact('malhas'));
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
