@extends('layouts.plantillaBase')
@section('contenido')
                        <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="">Tipo de Documento</label>
                                            <select  disabled="disabled" name= "id_tipoDocumento" id="id_tipoDocumento" class="form-control ">
                                                @foreach($tipoDoc as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Número de Documento</label>
                                            <input disabled="disabled" type="text" value="{{$perEmpleado->numeroDocumento}}"  class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento"  placeholder="Numero de Documento...">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->nombre1}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->nombre2}}"  class="form-control form-control-user" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->apellido1}}"  class="form-control form-control-user" id="apellido1" name="apellido1"  placeholder="Primer Apellido...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->apellido2}}"  class="form-control form-control-user" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->direccion}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="Direccion...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->telefono}}"  class="form-control form-control-user" id="telefono" name="telefono"  placeholder="Numero de Telefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->celular}}"  class="form-control form-control-user" id="celular" name="celular"  placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Correo</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->correo}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="Correo Electronico...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Género</label>
                                        <input disabled="disabled" type="text" value="{{$perEmpleado->genero}}"  class="form-control form-control-user" id="genero" name="genero"  placeholder="Correo Electronico...">
                                    </div>
                                    <div class="col-md-6">
                                        <img  style="width: 50%;" src="{{asset('images/'.$perEmpleado->foto)}}" alt="">
                                        <br>
                                        <input disabled="disabled" type="file" name="foto" id="foto" value="{{$perEmpleado->foto}}">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="departamento_ids">
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select  disabled="disabled" name= "depatamento_id" id="depatamento_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            <option value="" >[Seleccione un Departamento]</option>
                                            @foreach($departamentos as $departamento)
                                                <option {{ old('depatamento_id', $perEmpleado->depatamento_id) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select disabled="disabled"  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option value="" >[Seleccione una Ciudad]</option>
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('ciudad_id', $perEmpleado->ciudad_id) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                {{--EMPRESA--}}
                                @foreach($empresa as $e)
                                    @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                        <div class="row" id="departamento_ids">
                                            <div class="col-md-6">
                                                <label for="">Nivel de Empleo</label>
                                                <select  disabled="disabled" name= "nivelEmpleo_id" id="nivelEmpleo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="nivelEmplo()">
                                                    @foreach($nivelEmpleo as $nivel)
                                                        <option {{ old('nivelEmpleo_id', $perEmpleado->nivelEmpleo_id) == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Empleos</label>
                                                <select  disabled="disabled" name= "codigoEmpleo_id" id="codigoEmpleo_id" class="select2 form-control custom-select" >
                                                    <option value="" >[Seleccione un Empleo]</option>
                                                    @foreach($codEmpleo as $cod)
                                                        <option {{ old('codigoEmpleo_id', $perEmpleado->codigoEmpleo_id) == $cod->id ? 'selected' : '' }} value="{{$cod->id}}">{{$cod->nombre}}</option>
                                                        {{--<option value="{{$cod->id}}" {{ old('codigoEmpleo_id') == $cod->id ? 'selected' : '' }} >{{$cod->nombre}}</option>--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row" id="nombre1_rls">
                                            <div class="col-md-6">
                                                <label for="">Grado de Empleo</label>
                                                <input disabled="disabled" type="text"  class="form-control form-control-user"  id="gradoEmpleo" value="{{$perEmpleado->gradoEmpleo}}" name="gradoEmpleo"  placeholder="GRADO DE EMPLEO...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Unidad a Ejecutar</label>
                                                <select  disabled="disabled" name= "unidadEjecutara_id" id="unidadEjecutara_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                                    @foreach($unidadEje as $unidad)
                                                        <option {{ old('unidadEjecutara_id', $perEmpleado->unidadEjecutara_id) == $unidad->id ? 'selected' : '' }} value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Dependencia</label>
                                                <select  disabled="disabled" name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                                    @foreach($dependencia as $dep)
                                                        <option {{ old('id_unidadEjecutara', $dep->id_unidadEjecutara) == $dep->id ? 'selected' : '' }} value="{{$dep->id}}">{{$dep->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="">Ordenadores del Gasto</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio"  id="ordenadorGasto" name="ordenadorGasto"  value="1" {{ $perEmpleado->ordenadorGasto== '1' ? 'checked' : '' }} {{ old('ordenadorGasto')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show2();">SI</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio" id="ordenadorGasto" name="ordenadorGasto"  value="2" {{ $perEmpleado->ordenadorGasto== '2' ? 'checked' : '' }} {{ old('ordenadorGasto')=="2" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="show1();">NO</label>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                @if($perEmpleado->ordenadorGasto==1)
                                    <div class="" id="fueSi" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Acto Administación</label>
                                                <select name="actoAdministrativo" id="actoAdministrativo" class="form-control " >
                                                    <option value="{{$perEmpleado->actoAdministrativo}}">{{$perEmpleado->actoAdministrativo}}</option>
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
                                                <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->numeroActo}}" id="numeroActo" name="numeroActo"  placeholder="numero de Acto...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha Inicio de Autorización</label>
                                                <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaInicioAutorizacion}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="apellido1s">
                                            <div class="col-md-6">
                                                <label for="">Fecha Fin de Autorización</label>
                                                <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaFinAutorizacion}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha Revocatoria de Gasto</label>
                                                <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaRevocatoria}}" id="fechaRevocatoria" name="fechaRevocatoria"  placeholder="Vigencia cdp...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="direccions">
                                            <div class="col-md-6">
                                                <label for="">Fecha de Expedición</label>
                                                <input type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaExpedicion}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <label for="">Todos</label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="estadoSi" onclick="todos1()" name="todoAbmitos"  value="1" {{ $perEmpleado->todoAbmitos== '1' ? 'checked' : '' }} {{ old('todoAbmitos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="estadoNo" onclick="todos2()" name="todoAbmitos"  value="2" {{ $perEmpleado->todoAbmitos== '2' ? 'checked' : '' }} {{ old('todoAbmitos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row" id="todos">
                                            <div class="col-md-4">
                                                @if($perEmpleado->todoAbmitos==1)
                                                    <label for="">Código Presupuestal Desde</label>
                                                    <input  disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                                @else
                                                    <label for="">Código Presupuestal Desde</label>
                                                    <input  type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if($perEmpleado->todoAbmitos==1)
                                                    <label for="">Código Presupuestal Hasta</label>
                                                    <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                                @else
                                                    <label for="">Código Presupuestal Hasta</label>
                                                    <input type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Cuantia Hasta</label>
                                                <input type="text" class="form-control form-control-user" value="{{$perEmpleado->cuantiaHasta}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantia hasta...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row">
                                            <input type="hidden" value="PE" name="tipoPersona" id="tipoPersona">
                                            <div class="col-md-6">
                                                <label for="">Bienes y Servicios</label>
                                                <select  name= "id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="form-control ">
                                                    @foreach($ambitoServices as $services)
                                                        <option value="{{$services->id}}">{{$services->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Estado</label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="estado" name="estado" value="1" {{ $perEmpleado->estado== '1' ? 'checked' : '' }} {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACITVO</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="estado" name="estado" value="2" {{ $perEmpleado->estado== '2' ? 'checked' : '' }} {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="" id="fueSi" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Acto Administación</label>
                                                <select disabled="disabled" name="actoAdministrativo" id="actoAdministrativo" class="form-control " >
                                                    <option value="{{$perEmpleado->actoAdministrativo}}">{{$perEmpleado->actoAdministrativo}}</option>
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
                                                <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->numeroActo}}" id="numeroActo" name="numeroActo"  placeholder="numero de Acto...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha Inicio de Autorización</label>
                                                <input disabled="disabled" type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaInicioAutorizacion}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="apellido1s">
                                            <div class="col-md-6">
                                                <label for="">Fecha Fin deAutorización</label>
                                                <input disabled="disabled" type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaFinAutorizacion}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha Revocatoria de Gasto</label>
                                                <input disabled="disabled" type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaRevocatoria}}" id="fechaRevocatoria" name="fechaRevocatoria"  placeholder="Vigencia cdp...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="direccions">
                                            <div class="col-md-6">
                                                <label for="">Fecha de Expedición</label>
                                                <input disabled="disabled" type="date"  class="form-control form-control-user" value="{{$perEmpleado->fechaExpedicion}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <label for="">Todos</label>
                                                    <label class="radio-inline">
                                                        <input disabled="disabled" type="radio"  id="estadoSi" onclick="todos1()" name="todoAbmitos"  value="1" {{ $perEmpleado->todoAbmitos== '1' ? 'checked' : '' }} {{ old('todoAbmitos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input disabled="disabled" type="radio" id="estadoNo" onclick="todos2()" name="todoAbmitos"  value="2" {{ $perEmpleado->todoAbmitos== '2' ? 'checked' : '' }} {{ old('todoAbmitos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row" id="todos">
                                            <div class="col-md-4">
                                                @if($perEmpleado->todoAbmitos==1)
                                                    <label for="">Código Presupuestal Desde</label>
                                                    <input  disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                                @else
                                                    <label for="">Código Presupuestal Desde</label>
                                                    <input  disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoDesde}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="catalogo Presupuestal Desde...">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if($perEmpleado->todoAbmitos==1)
                                                    <label for="">Código Presupuestal Hasta</label>
                                                    <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                                @else
                                                    <label for="">Código Presupuestal Hasta</label>
                                                    <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->codigoPresupuestoHasta}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="catalogo Presupuestal Hasta...">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Cuantia Hasta</label>
                                                <input disabled="disabled" type="text" class="form-control form-control-user" value="{{$perEmpleado->cuantiaHasta}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantia hasta...">
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row">
                                            <input type="hidden" value="PE" name="tipoPersona" id="tipoPersona">
                                            <div class="col-md-6">
                                                <label for="">Bienes y Servicios</label>
                                                <select  disabled="disabled" name= "id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="form-control ">
                                                    @foreach($ambitoServices as $services)
                                                        <option value="{{$services->id}}">{{$services->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Estado</label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio"  id="estado" name="estado" value="1" {{ $perEmpleado->estado== '1' ? 'checked' : '' }} {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACITVO</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio" id="estado" name="estado" value="2" {{ $perEmpleado->estado== '2' ? 'checked' : '' }} {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div id="bancos" >
                                    <div class="row"  id="">
                                        <div class="col-md-12">
                                            <label for="">Entidad Bancaria</label>
                                            <select  disabled="disabled" name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                @foreach($entidadBancaria as $entidad)
                                                    {{--<option value="{{$entidad->id}}" {{ old('entidadBancaria_id') == $entidad->id ? 'selected' : '' }}>{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>--}}
                                                    <option {{ old('entidadBancaria_id', $perEmpleado->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}">{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                            <label for="">Número de Cuenta</label>
                                            <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$perEmpleado->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado Actual</label>
                                                <select  disabled="disabled" name= "estadoCuenta"  id="estadoCuenta" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{$perEmpleado->estadoCuenta}}">{{$perEmpleado->estadoCuenta}}</option>
                                                    <option value="Registro previo">Registro previo </option>
                                                    <option value="Inválida">Inválida</option>
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
                                                <label for="">Tipo Cuenta Bancaria</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $perEmpleado->TipocuentaBancaria== '1' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Ahorros</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $perEmpleado->TipocuentaBancaria== '2' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Corriente</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                        </div>
                    </div>
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
            }
        });

    });
</script>
<script !src="">
    function show1(){
        document.getElementById('fueSi').style.display ='none';

    }
    function show2() {
        document.getElementById('fueSi').style.display = 'block';
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
