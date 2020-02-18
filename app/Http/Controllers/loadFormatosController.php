<?php

namespace App\Http\Controllers;

use App\conceptoDianExogeno;
use Illuminate\Http\Request;

class loadFormatosController extends Controller
{
    public function loadFormato($id)
    {
        return response()->json(conceptoDianExogeno::where('formato_id', $id)->get());
    }
}
