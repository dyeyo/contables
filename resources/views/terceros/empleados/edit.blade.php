@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personas Naturales</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('personaEmpleado.index')}}">Personas Empleados</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Persona Empleado N°{{$perEmpleado->empleado->numeroDocumento}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>PERSONAS EMPLEADOS <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-warning">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <form class="user"  action="{{route('personaEmpleado.update',$perEmpleado->id)}}" method="post" enctype="multipart/form-data" id="terceros" name="terceros" >
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                            <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year'),$perEmpleado->anio}}" readonly="readonly">
                            <div class="row"  id="tipoDocumentos">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="id_tipoDocumento">Tipo de Documento</label>
                                        <select  name= "tipoDocumento_id" id="tipoDocumento_id" class="form-control ">
                                            <option value="">[Seleccione una opcion]</option>
                                            @foreach($tipoDoc as $tipo)
                                                <option {{ old('tipoDocumento_id', $perEmpleado->empleado->tipoDocumento_id) == $tipo->id ? 'selected' : '' }} value="{{$tipo->id}}">{{$tipo->nombreDocumento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Número de Documento</label>
                                        <input type="text" value="{{$perEmpleado->empleado->numeroDocumento}}"  class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento"  placeholder="Número de Documento...">
                                    </div>
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="nombre1s">
                                <div class="col-md-6">
                                    <label for="">Primer Nombre</label>
                                    <input type="text" value="{{$perEmpleado->nombre1}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Segundo Nombre</label>
                                    <input type="text" value="{{$perEmpleado->nombre2}}"  class="form-control form-control-user" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="apellido1s">
                                <div class="col-md-6">
                                    <label for="">Primer Apellido</label>
                                    <input type="text" value="{{$perEmpleado->apellido}}"  class="form-control form-control-user" id="apellido1" name="apellido"  placeholder="Primer Apellido...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Segundo Apellido</label>
                                    <input type="text" value="{{$perEmpleado->apellido2}}"  class="form-control form-control-user" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="direccions">
                                <div class="col-md-6">
                                    <label for="">Dirección</label>
                                    <input type="text" value="{{$perEmpleado->direccion}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="Dirección...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Teléfono</label>
                                    <input type="text" value="{{$perEmpleado->telefono}}"  class="form-control form-control-user" id="telefono" name="telefono"  placeholder="Número de Teléfono...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="celulars">
                                <div class="col-md-6">
                                    <label for="">Celular</label>
                                    <input type="text" value="{{$perEmpleado->celular}}"  class="form-control form-control-user" id="celular" name="celular"  placeholder="Celular...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Correo</label>
                                    <input type="text" value="{{$perEmpleado->correo}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="Correo Electrónico...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Género</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="{{$perEmpleado->empleado->genero}}">{{$perEmpleado->empleado->genero}}</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <img  style="width: 50%;" src="{{asset('images/'.$perEmpleado->foto)}}" alt="">
                                    <br>
                                    <input type="file" name="foto" id="foto" value="{{$perEmpleado->empleado->foto}}">
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="departamento_ids">
                                <div class="col-md-6">
                                    <label for="">Departamento</label>
                                    <select  name= "depatamento_id" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                        <option value="34">[Seleccione un Departamento]</option>
                                        @foreach($departamentos as $departamento)
                                            <option {{ old('depatamento_id', $perEmpleado->empleado->depatamento_id) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->nameDepartamento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ciudad</label>
                                    <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                        <option value="2">[Seleccione una ciudad]</option>
                                        @foreach($ciudades as $ciudad)
                                            <option {{ old('ciudad_id', $perEmpleado->empleado->ciudad_id) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        &nbsp
                        @foreach($empresa as $emp)
                            <input type="hidden" value="{{$emp->id}}" name="empresa_id" id="empresa_id">
                        @endforeach
                            {{--EMPRESA--}}
                            @foreach($empresa as $e)
                                @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                    <div class="row" id="departamento_ids">
                                        <div class="col-md-6">
                                            <label for="">Nivel de Empleo</label>
                                            <select  name= "nivelEmpleo_id" id="nivelEmpleo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="nivelEmplo()">
                                                <option value="6" >[Seleccione una opcion]</option>
                                            @foreach($nivelEmpleo as $nivel)
                                                    <option {{ old('nivelEmpleo_id', $perEmpleado->empleado->nivelEmpleo_id) == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Empleos</label>
                                            <select  name= "codigoEmpleo_id" id="codigoEmpleo_id" class="select2 form-control custom-select" >
                                                <option value="1" >[Seleccione un Empleo]</option>
                                                @foreach($codEmpleo as $cod)
                                                    <option {{ old('codigoEmpleo_id', $perEmpleado->empleado->codigoEmpleo_id) == $cod->id ? 'selected' : '' }} value="{{$cod->id}}">{{$cod->nombreEmpleo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="nombre1_rls">
                                        <div class="col-md-6">
                                            <label for="">Grado de Empleo</label>
                                            <input type="text"  class="form-control form-control-user"  id="gradoEmpleo" value="{{$perEmpleado->empleado->gradoEmpleo}}" name="gradoEmpleo"  placeholder="GRADO DE EMPLEO...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Unidad a Ejecutora</label>
                                            <select  name= "unidadEjecutara_id" id="unidadEjecutara_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                                @foreach($unidadEje as $unidad)
                                                    <option {{ old('unidadEjecutara_id', $perEmpleado->empleado->unidadEjecutara_id) == $unidad->id ? 'selected' : '' }} value="{{$unidad->id}}">{{$unidad->nombreUnidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Tipo de Vinculación</label>
                                            <select  name= "tipoVinculacion_id" id="tipoVinculacion_id" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="">[Seleccione uno]</option>
                                                @foreach($tipoVinculacion as $tipoVincular)
                                                    <option {{ old('tipoVinculacion_id', $perEmpleado->empleado->tipoVinculacion_id) == $tipoVincular->id ? 'selected' : '' }} value="{{$tipoVincular->id}}">{{$tipoVincular->nombreVinculacion}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Dependencia</label>
                                            <select  name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                                <option value="999">[Seleccione uno]</option>
                                                @foreach($dependencia as $dep)
                                                    <option {{ old('dependencia_id', $dep->dependencia_id) == $dep->id ? 'selected' : '' }} value="{{$dep->id}}">{{$dep->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        &nbsp
                            <div class="row"  id="nombre1s">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <label for="">Designar Supervisor</label>
                                        <label class="radio-inline">
                                        <input type="radio"  id="designadoSupervisor" name="designadoSupervisor"  value="SI" {{ $perEmpleado->empleado->designadoSupervisor=="SI" ? 'checked=':''}}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="designadoSupervisor" name="designadoSupervisor" value="NO" {{ $perEmpleado->empleado->designadoSupervisor=="NO" ? 'checked=':'' }}>NO</label>
                                    </div>
                                </div>
                            </div>

                            @if($perEmpleado->empleado->ordenadorGasto=='SI')
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="">Ordenadores del Gasto</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="ordenadorGasto" name="ordenadorGasto"  value="SI" {{ $perEmpleado->empleado->ordenadorGasto== 'SI' ? 'checked' : '' }} {{ old('ordenadorGasto')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show1();">SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="ordenadorGasto" name="ordenadorGasto"  value="NO" {{ $perEmpleado->empleado->ordenadorGasto== 'NO' ? 'checked' : '' }} {{ old('ordenadorGasto')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show2();">NO</label>
                                        </div>
                                    </div>
                                &nbsp
                                <div class="" id="fueSi" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Acto Administativo</label>
                                            <select name="actoAdministrativo" id="actoAdministrativo" class="form-control " >
                                                <option value="{{$perEmpleado->empleado->actoAdministrativo}}">{{$perEmpleado->empleado->actoAdministrativo}}</option>
                                                <option value="DECRETO">DECRETO</option>
                                                <option value="RESOLUCION">RESOLUCIÓN</option>
                                                <option value="ACTA">ACTA</option>
                                                <option value="OTRO">OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="celulars">
                                        <div class="col-md-6">
                                            <label for="">Numero Acto</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->numeroActo}}" id="numeroActo" name="numeroActo"  placeholder="numero de Acto...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Inicio de Autorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaInicioAutorizacion}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="apellido1s">
                                        <div class="col-md-6">
                                            <label for="">Fecha Fin deAutorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaFinAutorizacion}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Revocatoria de Gasto</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaRevocatoria}}" id="fechaRevocatoria" name="fechaRevocatoria"  placeholder="Vigencia cdp...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="direccions">
                                        <div class="col-md-6">
                                            <label for="">Fecha de Expedición</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaExpedicion}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <label for="">Todos</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="estadoSi" onclick="todos1()" name="todoAbmitos"  value="1" {{ $perEmpleado->empleado->todoAbmitos== '1' ? 'checked' : '' }} {{ old('todoAbmitos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="estadoNo" onclick="todos2()" name="todoAbmitos"  value="2" {{ $perEmpleado->empleado->todoAbmitos== '2' ? 'checked' : '' }} {{ old('todoAbmitos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="todos">
                                        <div class="col-md-4">
                                            @if($perEmpleado->todoAbmitos==1)
                                                <label for="">Codigo Presupuestal Desde</label>
                                                <input  disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                            @else
                                                <label for="">Codigo Presupuestal Desde</label>
                                                <input  type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            @if($perEmpleado->todoAbmitos==1)
                                            <label for="">Codigo Presupuestal Hasta</label>
                                            <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                            @else
                                                <label for="">Codigo Presupuestal Hasta</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cuantia Hasta</label>
                                            <input type="text" class="form-control form-control-user" value="{{$perEmpleado->empleado->cuantiaHasta}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantia hasta...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        {{--<input type="hidden" value="PE" name="tipoPersona" id="tipoPersona">--}}
                                        <div class="col-md-6">
                                            <label for="">Bienes y Servicios</label>
                                            <select  name="id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="form-control ">
                                                <option value="999">[Seleccione uno]</option>
                                                @foreach($ambitoServices as $services)
                                                    <option {{ old('id_ambitoBienesyServicios', $services->id_ambitoBienesyServicios) == $services->id ? 'selected' : '' }} value="{{$services->id}}">{{$services->nombreBien}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Estado</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio"  id="estado" name="estado" value="1" {{ $perEmpleado->empleado->estado== '1' ? 'checked' : '' }} {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACITVO</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="estado" name="estado" value="2" {{ $perEmpleado->empleado->estado== '2' ? 'checked' : '' }} {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                        </div>
                                    </div>
                                </div>
                            @else
                            &nbsp
                            <div class="row"  id="nombre1s">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="">Ordenadores del Gasto</label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="ordenadorGasto" name="ordenadorGasto"  value="1" {{ $perEmpleado->empleado->ordenadorGasto== '1' ? 'checked' : '' }} {{ old('ordenadorGasto')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show1();">SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="ordenadorGasto" name="ordenadorGasto" checked="checked" value="2" {{ $perEmpleado->empleado->ordenadorGasto== '2' ? 'checked' : '' }} {{ old('ordenadorGasto')=="2" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show2();">NO</label>
                                    </div>
                                </div>
                            </div>
                            &nbsp
                            <div class="" id="fueSi" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Acto Administación</label>
                                            <select name="actoAdministrativo" id="actoAdministrativo" class="form-control " >
                                                <option value="{{$perEmpleado->empleado->actoAdministrativo}}">{{$perEmpleado->empleado->actoAdministrativo}}</option>
                                                <option value="DECRETO">DECRETO</option>
                                                <option value="RESOLUCION">RESOLUCIÓN</option>
                                                <option value="ACTA">ACTA</option>
                                                <option value="OTRO">OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="celulars">
                                        <div class="col-md-6">
                                            <label for="">Número Acto</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->numeroActo}}" id="numeroActo" name="numeroActo"  placeholder="numero de Acto...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Inicio de Autorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaInicioAutorizacion}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="apellido1s">
                                        <div class="col-md-6">
                                            <label for="">Fecha Fin deAutorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaFinAutorizacion}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Revocatoria de Gasto</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaRevocatoria}}" id="fechaRevocatoria" name="fechaRevocatoria"  placeholder="Vigencia cdp...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="direccions">
                                        <div class="col-md-6">
                                            <label for="">Fecha de Expedición</label>
                                            <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->empleado->fechaExpedicion}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <label for="">Todos</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="estadoSi" onclick="todos1()" name="todoAbmitos"  value="1" {{ $perEmpleado->empleado->todoAbmitos== '1' ? 'checked' : '' }} {{ old('todoAbmitos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="estadoNo" onclick="todos2()" name="todoAbmitos"  value="2" {{ $perEmpleado->empleado->todoAbmitos== '2' ? 'checked' : '' }} {{ old('todoAbmitos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="todos">
                                        <div class="col-md-4">
                                            @if($perEmpleado->todoAbmitos==1)
                                                <label for="">Codigo Presupuestal Desde</label>
                                                <input  disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                            @else
                                                <label for="">Codigo Presupuestal Desde</label>
                                                <input  type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            @if($perEmpleado->todoAbmitos==1)
                                                <label for="">Codigo Presupuestal Hasta</label>
                                                <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                            @else
                                                <label for="">Codigo Presupuestal Hasta</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cuantia Hasta</label>
                                            <input type="text" class="form-control form-control-user" value="{{$perEmpleado->empleado->cuantiaHasta}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantia hasta...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        <input type="hidden" value="PE" name="tipoPersona" id="tipoPersona">
                                        <div class="col-md-6">
                                            <label for="">Bienes y Servicios</label>
                                            <select  name="id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="form-control ">
                                                @foreach($ambitoServices as $services)
                                                    <option {{ old('id_ambitoBienesyServicios', $services->id_ambitoBienesyServicios) == $services->id ? 'selected' : '' }} value="{{$services->id}}">{{$services->nombreBien}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Estado</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio"  id="estado" name="estado" value="1" {{ $perEmpleado->empleado->estado== '1' ? 'checked' : '' }} {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACITVO</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="estado" name="estado" value="2" {{ $perEmpleado->empleado->estado== '2' ? 'checked' : '' }} {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        &nbsp
                        @if ($perEmpleado->empleado->entidadBancaria_id == '1')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Información Bancaria</label>
                                    <label class="radio-inline">
                                        <input type="radio"  id="SiInfo"  onclick="showBancos1()" name="banco" value="1"  {{ old('banco')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                    <label class="radio-inline">
                                        <input type="radio" id="NoInfo" onclick="showBancos2()" checked="checked" name="banco"  value="2" {{ old('banco')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                </div>
                            </div>
                            <div id="bancos" style="display:none;">
                                <div class="row"  id="">
                                    <div class="col-md-12">
                                        <label for="">Entidad Bancaria</label>
                                        <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="1">[SELECCIONES UNA ENTIDAD]</option>
                                            @foreach($entidadBancaria as $entidad)
                                                <option {{ old('entidadBancaria_id', $perEmpleado->empleado->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <label for="">Entidad Bancaria</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estado de Cuenta</label>
                                            <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="{{$perEmpleado->empleado->estadoCuenta}}"  >{{$perEmpleado->empleado->estadoCuenta}}</option>
                                                <option value="Registro previo">Registro previo </option>
                                                <option value="Activa">Activa</option>
                                                <option value="Inactiva">Inactiva</option>
                                                <option value="Cancelada">Cancelada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipo de Cuenta Bancaria</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $perEmpleado->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $perEmpleado->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="bancos" >
                                <div class="row"  id="">
                                    <div class="col-md-12">
                                        <label for="">Información Bancaria</label>
                                        <select  name= "1" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            @foreach($entidadBancaria as $entidad)
                                                <option {{ old('entidadBancaria_id', $perEmpleado->empleado->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <label for="">Número de Cuenta Bancaria</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->empleado->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estado de Cuenta</label>
                                            <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="{{$perEmpleado->empleado->estadoCuenta}}"  >{{$perEmpleado->empleado->estadoCuenta}}</option>
                                                <option value="Registro previo">Registro previo </option>
                                                <option value="Activa">Activa</option>
                                                <option value="Inactiva">Inactiva</option>
                                                <option value="Cancelada">Cancelada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipo de Cuenta Bancaria</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $perEmpleado->empleado->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $perEmpleado->empleado->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        &nbsp
                        <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                        &nbsp
                    </form>
                    @can('personaEmpleado.destroy')
                        <form method="POST" id="deleteTipoDoc"
                              action="{{route('personaEmpleado.destroy',$perEmpleado->id)}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger " style="width: 20%;margin-left: 80%;">ELIMINAR</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>

<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.selectpicker').selectpicker();
    });
</script>
<script>
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                tipoDocumento_id: {
                    required: true,
                },
                numeroDocumento : {
                    required: true,
                },
                nombre1: {
                    required: true,
                },
                apellido1: {
                    required: true,
                },
                telefono: {
                    digits: true,
                },
                celular:{
                    digits: true,
                },
                correo:{
                    email: true,
                },
                designadoSupervisor:{
                    required:true,
                },
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },
            },
            messages: {
                tipoDocumento_id: {
                    required: "Este campo es Obligatorio",
                },
                numeroDocumento: {
                    required: "Este campo es Obligatorio",
                },
                nombre1: {
                    required: "Este campo es Obligatorio",
                },
                apellido1: {
                    required: "Este campo es Obligatorio",
                },
                telefono:{
                    digits:"Este campo solo revise digitos"
                },
                celular:{
                    digits:"Este campo solo revise digitos"
                },
                correo:{
                    email:"Este campo debe ser un correo electronico"
                },
                designadoSupervisor: {
                    required: "Debe marcar una de las opciones",
                },
                numeroCuenta: {
                    digits:"Este campo solo revise digitos",
                    maxlength:"El limite es de 20 números"
                },
            }
        });

    });
</script>
<script !src="">
    function show1(){
        document.getElementById('fueSi').style.display ='block';

    }
    function show2() {
        document.getElementById('fueSi').style.display = 'none';
    }

    function todos1(){
        //alert('ss')
        $('#codigoPresupuestoDesde').prop("disabled",true);
        $('#codigoPresupuestoHasta').prop("disabled",true);

    }
    function todos2() {
        //alert('ss')
        $('#codigoPresupuestoDesde').prop("disabled",false);
        $('#codigoPresupuestoHasta').prop("disabled",false);
    }


</script>
<script !src="">
    function showBancos1(){
        document.getElementById('bancos').style.display ='block';

    }
    function showBancos2() {
        document.getElementById('bancos').style.display = 'none';
    }
</script>
