<?php

namespace App\Http\Controllers;

use App\MacroprocesosBancarios;
use Illuminate\Http\Request;

class MacroprocesosBancariosController extends Controller
{

    public function index()
    {
        $macroProcesos=MacroprocesosBancarios::all();
        return view('macroProcesos.index',compact('macroProcesos'));
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
