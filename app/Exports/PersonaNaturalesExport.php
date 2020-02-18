<?php

namespace App\Exports;

use App\Persona;
use App\PersonasNaturales;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonaNaturalesExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Tipo de Documento',
            'Número de Documento',
            'Primer Nombre',
            'Segundo Nombre',
            'Primer Apellido',
            'Segundo Apellido',
            'Dirección',
            'Telefono',
            'Celular',
            'correo',
            'Ciudad',
            'Departamento',
            'Pais',
            'Responsable IVA',
            'designado Supervisor',
            'Regien Simple',
            'TipocuentaBancaria',
            'Número de Cuenta',
            'Estado de Cuenta',
            'Tipo de Persona',
            'Clase de Persona',
            'Sub Clase',
            'Actividad Ciiu',
            'Descritores Ciiu',
            'EntidadBancaria',
            'Dependencia'
        ];
    }

    public function collection()
    {
        return DB::table('personas')
            ->join('personas_naturales', 'personas.natural_id', '=', 'personas_naturales.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'personas_naturales.id_tipoDocumento')
            ->join('clase_personas', 'clase_personas.id', '=', 'personas_naturales.id_clase')
            ->join('ciiu_actividades', 'ciiu_actividades.id', '=', 'personas_naturales.id_actividadesCiiu')
            ->join('ciiu_descriptores', 'ciiu_descriptores.id', '=', 'personas_naturales.descritores_id')
            ->join('ciudades', 'ciudades.id', '=', 'personas_naturales.ciudad_id')
            ->join('departamentos', 'departamentos.id', '=', 'personas_naturales.idDepartamento')
            ->join('entidad_bancarias', 'entidad_bancarias.id', '=', 'personas_naturales.entidadBancaria_id')
            ->join('dependencias', 'dependencias.id', '=', 'personas_naturales.dependencia_id')

            ->select(
                'tipo_documentos.nombreDocumento','personas_naturales.numeroDocumento','personas.nombre1',
                'personas.nombre2','personas.apellido','personas.apellido2','personas.direccion','personas.telefono',
                'personas.celular','personas.correo','ciudades.name','departamentos.nameDepartamento','personas.pais',
                'personas.responsableIVA','personas.regimenSimple',

                'personas_naturales.designadoSupervisor','personas_naturales.TipocuentaBancaria','personas_naturales.numeroCuenta',
                'personas_naturales.estadoCuenta','personas_naturales.tipoPersona',

                'clase_personas.nombre','personas_naturales.Subclase','ciiu_actividades.descripcion','ciiu_descriptores.actividad',
                'entidad_bancarias.DenominacionAbreviadaEntidad', 'dependencias.codigo'
            )

            ->get();

        //dd($rows->toArray());
    }

}
