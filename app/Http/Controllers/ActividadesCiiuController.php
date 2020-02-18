<?php

namespace App\Http\Controllers;

use App\CiiuActividades;
use Illuminate\Http\Request;

class ActividadesCiiuController extends Controller
{
    public function loadActividades($id)
    {
        return response()->json(CiiuActividades::where('descritores_id', $id)->get());
    }
}
