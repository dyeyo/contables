<?php

namespace App\Http\Controllers;

use App\PlantillaContable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EditarPlantillaController extends Controller
{
    //ESTO ESTA AQUI PORQUE EN LA RUTAS DA UN PROBLEMA CON TODOS LOS PUTS
    public function updatePlantilla(Request $request, $id)
    {
        //dd('updatePlantilla');
        $plantilla=PlantillaContable::findOrFail($id);
        $plantilla->update($request->all());

        Session::flash('message', 'La plantilla se elimino con exito');
        return back();
    }
}
