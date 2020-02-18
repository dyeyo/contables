@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Roles y Permisos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('roles.index')}}">Roles y Permisos</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Crear Roles y Permisos</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>ROLES Y PERMISOS <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar*</small></h5>
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
                    <form class="user"  action="{{route('roles.store')}}" method="post" id="terceros" name="terceros">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="">Nombre de Rol</label>
                            <input type="text" class="form-control form-control-user"  id="name" name="name"  placeholder="NOMBRE...">
                        </div>
                        <div class="form-group">
                            <label for="">URL Amigable</label>
                            <input type="text" class="form-control form-control-user"  id="slug" name="slug"  placeholder="SLUG...">
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea class="form-control form-control-user"  id="description" name="description"></textarea>
                        </div>
                        <hr>
                        <h3>Permiso especial</h3>
                        <div class="form-group">
                            <label for=""></label>
                            <label class="radio-inline">
                                <input type="checkbox"  id="designadoSupervisor" name="special"  value="all-access" {{ old('special')=="all-access" ? 'checked='.'"'.'checked'.'"' : '' }}>Acceso total</label>
                            <label class="radio-inline">
                                <input type="checkbox" id="designadoSupervisor" name="special" value="no-access" {{ old('special')=="no-access" ? 'checked='.'"'.'checked'.'"' : '' }}>Ningún acceso</label>
                        </div>
                        <hr>
                        <h3>Lista de permisos</h3>

                        <div class="row p-t-20">
                            <?php $item = 'modulo'; ?>
                            @foreach($permissions as $module)
                                @if($module->module != $item)
                                    <div class="col-md-6">
                                        <hr>
                                        <h3 style="text-transform: uppercase">{{$module->module}}</h3>
                                        @foreach($permissions as $permission)
                                            @if($module->module == $permission->module)
                                                <div class="checkbox checkbox-success m-l-10">
                                                    <input id="permissions[]" name="permissions[]" type="checkbox" value="{{$permission->id}}">
                                                    <label for="checkbox">{{$permission->name}}</label>
                                                    <em>({{$permission->description}})</em>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <?php $item = $module->module ?>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit">AGEGRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection