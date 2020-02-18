<?php
namespace App\Exports;

use App\Transacciones;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaccionesExport implements FromView
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    //public function view($id): View
    public function view(): View
    {
        return view('transacciones.export', [
            'trans' => Transacciones::where('id',$this->data)->get()
        ]);
    }


    /**
     * FORMA CONBENCIONAL
     */
    /*public function collection()
    {
        return Transacciones::all();
    }*/


}

