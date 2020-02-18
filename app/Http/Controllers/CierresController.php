<?php
namespace App\Http\Controllers;
use App\Cierres;
use App\ConceptosCierres;
use App\Puc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class CierresController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $cierres = Cierres::where('anio',$anio)->get();
        $puc=Puc::all();
        return view('cierres.index',compact('cierres','puc'));
    }
    public function create()
    {
        $cierres=Cierres::all();
        $puc=Puc::all();
        return view('cierres.create',compact('cierres','puc'));
    }
    public function store(Request $request)
    {
        $cierre =  new Cierres();
        $cierre -> anio=$request->anio;
        $cierre->save();
        if ($request->cierres_id){
            $cierreCon = $request->cierres_id;
                foreach($cierreCon as $key => $value) {
                    try{
                        $cierre->cieresConcepto()->create([
                            'cierres_id' => $request->cierres_id[$key],
                            'nombreConcepto' => $request->nombreConcepto[$key],
                            'puc_id' => $request->puc_id[$key],
                        ]);
                    }catch ( \ErrorException $e ){
                        Session::flash('message','Cierres Realizado con éxito');
                        return redirect()->route('cierres.index');
                    }
            }
        }
        Session::flash('message','Cierres Realizado con éxito');
        return redirect()->route('cierres.index');
    }
    public function edit($id)
    {
        $cierres=Cierres::findOrFail($id);
        $puc=Puc::all();
        //$conceptos=ConceptosCierres::where('cierres_id ','=',$id)->get();
        $conceptos=DB::table('conceptos_cierres')
            ->leftJoin('pucs', 'conceptos_cierres.puc_id', '=', 'pucs.id')
            ->select('conceptos_cierres.id','conceptos_cierres.nombreConcepto','pucs.codigo_cuenta')
            ->where('conceptos_cierres.cierres_id','=',$id)
            ->get();
        //dd($conceptos);
        return view('cierres.edit',compact('cierres','puc','conceptos'));
    }
    public function update(Request $request, $id)
    {
        $cierre=Cierres::find($id);
        $cierre -> anio=$request->anio;
        //dd($request->cierres_id);
        $cierre->update();
        $cierreCon = $request->cierres_id;
        foreach($cierreCon as $key => $value) {
            $cierre->cieresConcepto()->create([
                'cierres_id' => $request->cierres_id[$key],
                'nombreConcepto' => $request->nombreConcepto[$key],
                'puc_id' => $request->puc_id[$key],
            ]);
        }
        Session::flash('message','Cierres Editada con éxito');
        return redirect()->route('cierres.index');
    }
    public function updateConcepto(Request $request, $id)
    {
        $cierre=ConceptosCierres::findOrFail($id);
        //dd($request->all());
        $cierre->puc_id = $request->puc_id;
        Session::flash('message','Cuenta Editada con éxito');
        return back();
    }
    public function destroy($id)
    {
        //
    }
    public function destroyConcepto($id)
    {
        $cierre=ConceptosCierres::findOrFail($id);
        $cierre->delete();
        Session::flash('message', 'Concepto Eliminado con exito');
        return back();
    }
}