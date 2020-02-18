<?php

namespace App\Http\Controllers;

use App\Ciudades;
use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    public function loadCiudades ($id)
    {
        return response()->json(Ciudades::where('departamento_id', $id)->get());
    }
}
