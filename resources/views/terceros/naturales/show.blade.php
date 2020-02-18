@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">PERSONAS NATURAL {{$personaNatural->numeroDocumento}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="id_tipoDocumento">Tipo de Documento</label>
                                            <select  disabled="disabled" name= "id_tipoDocumento" id="id_tipoDocumento" class="form-control ">
                                                @foreach($tipoDoc as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numeroDocumento">Número de Documento</label>                                            <input disabled="disabled" type="text" value="{{$personaNatural->numeroDocumento}}"  class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento"  placeholder="Numero de Documento...">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->nombre1}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->nombre2}}"  class="form-control form-control-user" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->apellido1}}"  class="form-control form-control-user" id="apellido1" name="apellido1"  placeholder="Primer Apellido...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->apellido2}}"  class="form-control form-control-user" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->direccion}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="Direccion...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Telefono</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->telefono}}"  class="form-control form-control-user" id="telefono" name="telefono"  placeholder="Numero de Telefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->celular}}"  class="form-control form-control-user" id="celular" name="celular"  placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input disabled="disabled" type="text" value="{{$personaNatural->correo}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="Correo Electronico...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                        <label for="">Correo</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio"  id="responsableIVA" name="responsableIVA" value="1"  {{ $personaNatural->responsableIVA== '1' ? 'checked' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio"  id="responsableIVA" name="responsableIVA" value="2"  {{ $personaNatural->responsableIVA== '2' ? 'checked' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Responsable de IVA</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio"  id="regimenSimple" name="regimenSimple" value="1" {{ $personaNatural->regimenSimple== '1' ? 'checked' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio" id="regimenSimple" name="regimenSimple" value="2" {{ $personaNatural->regimenSimple== '2' ? 'checked' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Régimen Simple</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio"  id="autoRedesignadoSupervisortenedor" name="designadoSupervisor" value="1" {{ $personaNatural->designadoSupervisor== '1' ? 'checked' : '' }}  {{ old('designadoSupervisor')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input disabled="disabled" type="radio" id="designadoSupervisor" name="designadoSupervisor" value="2" {{ $personaNatural->designadoSupervisor== '2' ? 'checked' : '' }} {{ old('designadoSupervisor')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="departamento_ids">
                                    <div class="col-md-6">
                                            <label for="">Designar Supervisor</label>
                                        <select disabled="disabled"  name= "idDepartamento" id="depatamento_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            <option value="">[Seleccione un Departamento]</option>
                                            @foreach($departamentos as $departamento)
                                                <option {{ old('idDepartamento', $personaNatural->idDepartamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select disabled="disabled" name= "idCiudad" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option  value="">[Seleccione una ciudad]</option>
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('idCiudad', $personaNatural->idCiudad) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <input type="hidden" value="PN" name="tipoPersona" id="tipoPersona">
                                <div class="row" id="idActividads">
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select disabled="disabled" name= "id_descriptorsCiiu" id="id_descriptorsCiiu" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                            <option value="">[Seleccione una Descripcion]</option>
                                            @foreach($descriptoresnCiiu as $descriptores)
                                                <option {{ old('id_descriptorsCiiu', $personaNatural->id_descriptorsCiiu) == $descriptores->id ? 'selected' : '' }}  value="{{$descriptores->id}}">{{$descriptores->actividad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Descriptores CIIU</label>
                                        <select disabled="disabled" name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una Actividad]</option>
                                            @foreach($actividadesCiiu as $actividad)
                                                <option {{ old('id_actividadesCiiu', $personaNatural->id_actividadesCiiu) == $actividad->id ? 'selected' : '' }}  value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="id_clases">
                                    <div class="col-md-12">
                                        <label for="">Actividades CIIU</label>
                                        <select disabled="disabled" onChange="ClaseId(this)" name= "id_clase" id="id_clase" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            @foreach($claseP as $clase)
                                                <option {{ old('id_clase', $personaNatural->id_clase) == $clase->id ? 'selected' : '' }}  value="{{$clase->id}}">{{$clase->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <label for="">Clase de Persona</label>
                                        <select  disabled="disabled" name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="">[Seleccione una dependencia]</option>
                                            @foreach($dependencias as $dep)
                                                <option {{ old('dependencia_id', $personaNatural->dependencia_id) == $dep->id ? 'selected' : '' }}  value="{{$dep->id}}">{{$dep->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    &nbsp
                                    <div class="col-md-6" style="display:none;">
                                        <label for="">Dependencia</label>
                                        <select  disabled="disabled" name= "Subclase"  id="Subclase" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="0">[Seleccione una SubClase]</option>
                                            <option value="2.02 MISIONAL">MISIONAL</option>
                                            <option value="2.04 DE APOYO">DE APOYO</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="bancos" >
                                    <div class="row"  id="">
                                        <div class="col-md-12">
                                        <label for="">Sub Clase</label>
                                            <select  disabled="disabled" name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                @foreach($entidadBancaria as $entidad)
                                                    {{--<option value="{{$entidad->id}}" {{ old('entidadBancaria_id') == $entidad->id ? 'selected' : '' }}>{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>--}}
                                                    <option {{ old('entidadBancaria_id', $personaNatural->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}">{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                        <label for="">Información Bancaria</label>
                                            <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$personaNatural->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Entidad Bancaria</label>
                                                <select  disabled="disabled" name= "estadoCuenta"  id="estadoCuenta" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{$personaNatural->estadoCuenta}}">{{$personaNatural->estadoCuenta}}</option>
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
                                            <label for="">Número de Cuenta</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personaNatural->TipocuentaBancaria== '1' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Ahorros</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personaNatural->TipocuentaBancaria== '2' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Corriente</label>
                                            </div>
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
@endsection
