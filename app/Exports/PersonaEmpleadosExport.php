<?php

namespace App\Exports;

use App\PersonasEmpleados;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonaEmpleadosExport implements FromCollection,WithHeadings
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
            'Segundo apellido',
            'Dirección',
            'Telefono',
            'Celular',
            'Correo',
            'Ciudad',
            'Departamento',
            'Pais',
            'Grado de Empleo',
            'Designado Supervisor',
            'Fecha de Nacimiento',
            'Fecha de Vinculación',
            'Ordenador Gasto',
            'Acto Administrativo',
            'Fecha de Expedicion',
            'numeroActo',
            'Fecha de Inicio de Autorizacion',
            'Fecha de Fin deAutorizacion',
            'Fecha de Revocatoria',
            'Genero',
            'Codigo Presupuesto Desde',
            'Codigo Presupuesto Hasta',
            'Cuantia Hasta',
            'Estado de Cuenta',
            'Numero de Cuenta',
            'Tipo de cuenta Bancaria',
            'Estado de Cuenta',
            'Tipo de Vinculacion',
            'Nivel de Empleo',
            'Codigo de Empleo',
            'Unidad Ejecutora',
            'Dependencia',
            'Ambitos Bienes y Servicios',
            'Entidad Bancaria',
        ];
    }

    public function collection()
    {
        return DB::table('personas')
                ->join('personas_empleados', 'personas.empleado_id', '=', 'personas_empleados.id')
                ->join('tipo_documentos', 'tipo_documentos.id', '=', 'personas_empleados.tipoDocumento_id')
                ->join('tipo_vinculacions', 'tipo_vinculacions.id', '=', 'personas_empleados.tipoVinculacion_id')
                ->join('ciudades', 'ciudades.id', '=', 'personas_empleados.ciudad_id')
                ->join('departamentos', 'departamentos.id', '=', 'personas_empleados.depatamento_id')
                ->join('nivel_empleos', 'nivel_empleos.id', '=', 'personas_empleados.nivelEmpleo_id')
                ->join('codigo_empleos', 'codigo_empleos.id', '=', 'personas_empleados.codigoEmpleo_id')
                ->join('unidad_ejecutaras', 'unidad_ejecutaras.id', '=', 'personas_empleados.unidadEjecutara_id')
                ->join('dependencias', 'dependencias.id', '=', 'personas_empleados.dependencia_id')
                ->join('ambitosy_bienes', 'ambitosy_bienes.id', '=', 'personas_empleados.id_ambitoBienesyServicios')
                ->join('entidad_bancarias', 'entidad_bancarias.id', '=', 'personas_empleados.entidadBancaria_id')
                ->select(
                    'tipo_documentos.nombreDocumento','personas_empleados.numeroDocumento',
                    'personas.nombre1', 'personas.nombre2', 'personas.apellido',
                    'personas.apellido2', 'personas.direccion', 'personas.telefono', 'personas.celular',
                    'personas.correo','ciudades.name','departamentos.nameDepartamento','personas.pais',

                    'personas_empleados.gradoEmpleo','personas_empleados.designadoSupervisor','personas_empleados.fec_nacimiento',
                    'personas_empleados.fec_vinculacion','personas_empleados.ordenadorGasto','personas_empleados.actoAdministrativo',
                    'personas_empleados.fechaExpedicion','personas_empleados.numeroActo','personas_empleados.fechaInicioAutorizacion',
                    'personas_empleados.fechaFinAutorizacion','personas_empleados.fechaRevocatoria','personas_empleados.genero',
                    'personas_empleados.codigoPresupuestoDesde','personas_empleados.codigoPresupuestoHasta',
                    'personas_empleados.cuantiaHasta','personas_empleados.estado','personas_empleados.numeroCuenta',
                    'personas_empleados.TipocuentaBancaria','personas_empleados.estadoCuenta',

                    'tipo_vinculacions.nombreVinculacion', 'nivel_empleos.nombre', 'codigo_empleos.nombreEmpleo',
                    'unidad_ejecutaras.nombreUnidad', 'dependencias.codigo','ambitosy_bienes.nombreBien',
                    'entidad_bancarias.DenominacionAbreviadaEntidad'
                )
                ->get();

        //dd($g->toArray());

    }
}
