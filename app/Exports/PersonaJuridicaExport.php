<?php

namespace App\Exports;

use App\Persona;
use App\PersonasJuridicas;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonaJuridicaExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'NIT',
            'Digito de Verificación',
            'Razon Social',
            'Nombre Comercial',
            'Primer Nombre Reprsentante Legal',
            'Segundo Nombre Reprsentante Legal',
            'Primer Apellido Reprsentante Legal',
            'Segundo Apellido Reprsentante Legal',
            'Dirección Reprsentante Legal',
            'Telefono Reprsentante Legal',
            'Celular Reprsentante Legal',
            'correo Reprsentante Legal',
            'Ciudad',
            'Departamento',
            'Pais',
            'Responsable IVA',
            'Regimen Simple',
            'Auto Retenedor',
            'Tipo de Cuenta Bancaria',
            'Número de Cuenta Bancaria',
            'Estado de Cuenta',
            'Banco',
            'Regimen Tributario',
            'Actividad Ciiu',
            'Descritores Ciiu',
            'Entidad Bancaria'
        ];
    }

    public function collection()
    {
        return DB::table('personas')
            //->where('personas_juridicas.id','=','personas.juridica_id')
            ->join('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->join('regimen_tributarios', 'regimen_tributarios.id', '=', 'personas_juridicas.id_regimenTributario')
            ->join('ciiu_actividades', 'ciiu_actividades.id', '=', 'personas_juridicas.id_actividadesCiiu')
            ->join('ciudades', 'ciudades.id', '=', 'personas_juridicas.ciudad_id')
            ->join('departamentos', 'departamentos.id', '=', 'personas_juridicas.idDepartamento')
            ->join('ciiu_descriptores', 'ciiu_descriptores.id', '=', 'personas_juridicas.descritores_id')
            ->join('entidad_bancarias', 'entidad_bancarias.id', '=', 'personas_juridicas.entidadBancaria_id')
            ->select(
             'personas_juridicas.nit', 'personas_juridicas.dv', 'personas_juridicas.raz_social',
             'personas_juridicas.nomComercial',
             'personas.nombre1', 'personas.nombre2', 'personas.apellido',
             'personas.apellido2', 'personas.direccion', 'personas.telefono', 'personas.celular',
             'personas.correo','ciudades.name','departamentos.nameDepartamento','personas.pais',
             'personas.responsableIVA','personas.regimenSimple',

             'personas_juridicas.autoRetenedor','personas_juridicas.TipocuentaBancaria', 'personas_juridicas.numeroCuenta',
             'personas_juridicas.estadoCuenta','personas_juridicas.banco',

             'regimen_tributarios.nombre','ciiu_actividades.descripcion','ciiu_descriptores.actividad',
             'entidad_bancarias.DenominacionAbreviadaEntidad'
            )
            ->get();
        //dd($d->toArray());
    }
}


