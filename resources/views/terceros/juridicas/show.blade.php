@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card shadow mb-4" id="datosBasicos" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PESRONA JURIDICA {{$personajuridica->nit}}</h6>
                        </div>
                        <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <div class="form-group">
                                                <label for="">Razón Social</label>
                                                <input type="text" disabled="disabled"  value="{{$personajuridica->raz_social}}" class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre del comercio</label>
                                            <input type="text" disabled="disabled"  value="{{$personajuridica->nomComercial}}" class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento" >
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->nombre1_rl}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->nombre2_rl}}"  class="form-control form-control-user" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->apellido1_rl}}"  class="form-control form-control-user" id="apellido1" name="apellido1"  placeholder="Primer Apellido...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->apellido2_rl}}"  class="form-control form-control-user" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->direccion_rl}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="Direccion...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->telefono_rl}}"  class="form-control form-control-user" id="telefono" name="telefono"  placeholder="Número de Télefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->celular_rl}}"  class="form-control form-control-user" id="celular" name="celular"  placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Correo</label>
                                        <input type="text" disabled="disabled" value="{{$personajuridica->correo_rl}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="Correo Electrónico...">
                                    </div>
                                </div>
                            &nbsp
                            <div class="row "  id="checks">
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="">Responsable IVA</label>
                                            <label class="radio-inline">
                                                <input type="radio" disabled="disabled"  id="responsableIVA" name="responsableIVA" value="1" {{ $personajuridica->responsableIVA== '1' ? 'checked' : '' }} {{ old('responsableIVA')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" disabled="disabled" id="responsableIVA" name="responsableIVA" value="2" {{ $personajuridica->responsableIVA== '2' ? 'checked' : '' }} {{ old('responsableIVA')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Régimen Simple</label>
                                            <label class="radio-inline">
                                                <input type="radio" disabled="disabled"  id="regimenSimple" name="regimenSimple" value="1" {{ $personajuridica->regimenSimple== '1' ? 'checked' : '' }} {{ old('regimenSimple')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" disabled="disabled" id="regimenSimple" name="regimenSimple" value="2" {{ $personajuridica->regimenSimple== '' ? 'checked' : '' }}  {{ old('regimenSimple')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Auto Retenedor</label>
                                            <label class="radio-inline">
                                                <input type="radio"  disabled="disabled" id="autoRetenedor" name="autoRetenedor" value="1" {{ $personajuridica->autoRetenedor== '1' ? 'checked' : '' }} {{ old('autoRetenedor')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" disabled="disabled" id="autoRetenedor" name="autoRetenedor" value="2" {{ $personajuridica->autoRetenedor== '2' ? 'checked' : '' }} {{ old('autoRetenedor')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                            </div>
                            &nbsp
                            <div class="row" id="departamento_ids">
                                <div class="col-md-6">
                                    <label for="">Departamento</label>
                                    <select disabled="disabled" name= "idDepartamento" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                        @foreach($departamentos as $departamento)
                                            <option disabled="disabled" {{ old('idDepartamento', $personajuridica->idDepartamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ciudad</label>
                                    <select disabled="disabled" name= "idCiudad" id="idCiudad" class="select2 form-control custom-select" >
                                        @foreach($ciudades as $ciudad)
                                            <option disabled="disabled" {{ old('idCiudad', $personajuridica->idCiudad) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="idActividads">
                                <div class="col-md-6">
                                    <label for="">Descriptores</label>
                                    <select disabled="disabled"  name= "descritores_id" id="descritores_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                        @foreach($descriptoresnCiiu as $descriptores)
                                            <option disabled="disabled" {{ old('descritores_id', $personajuridica->descritores_id) == $descriptores->id ? 'selected' : '' }}  value="{{$descriptores->id}}">{{$descriptores->actividad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Actividades</label>
                                    <select  disabled="disabled" name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" >
                                        @foreach($actividadCiiu as $actividad)
                                            <option disabled="disabled" {{ old('id_actividadesCiiu', $personajuridica->id_actividadesCiiu) == $actividad->id ? 'selected' : '' }}  value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="id_clases">
                                <div class="col-md-12">
                                    <label for="">Regimen Tributario</label>
                                    <select disabled="disabled" name= "id_regimenTributario" id="id_regimenTributario" class="form-control ">
                                        <option value="">[Seleccione un Regimen]</option>
                                        @foreach($regimenTribuario as $regimen)
                                            <option {{ old('id_regimenTributario', $personajuridica->id_regimenTributario) == $regimen->id ? 'selected' : '' }} value="{{$regimen->id}}">{{$regimen->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            &nbsp
                            @if($personajuridica->numeroCuenta!= '')
                                <div id="bancos" >
                                    <div class="row"  id="">
                                        <div class="col-md-12">
                                            <label for="">Entidad Bancaria</label>
                                            <select  disabled="disabled" name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                @foreach($entidadBancaria as $entidad)
                                                    {{--<option value="{{$entidad->id}}" {{ old('entidadBancaria_id') == $entidad->id ? 'selected' : '' }}>{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>--}}
                                                    <option {{ old('entidadBancaria_id', $personajuridica->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}">{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                            <label for="">Número de Cuenta</label>
                                            <input disabled="disabled" type="text"  class="form-control form-control-user" value="{{$personajuridica->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado Actual</label>
                                                <select  disabled="disabled" name= "estadoCuenta"  id="estadoCuenta" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{$personajuridica->estadoCuenta}}">{{$personajuridica->estadoCuenta}}</option>
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
                                                <label for="">Típo Cuenta Bancaria</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personajuridica->TipocuentaBancaria== '1' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Ahorros</label>
                                                <label class="radio-inline">
                                                    <input disabled="disabled" type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personajuridica->TipocuentaBancaria== '2' ? 'checked' : '' }}{{ old('TipocuentaBancaria')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Corriente</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            &nbsp
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection