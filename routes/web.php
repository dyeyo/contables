<?php


/*RUTAS DECLARDAS MANUALMENTE */
Route::get('/login',  'Auth\LoginController@loginForm')->name('login');
Route::post('/login',  'Auth\LoginController@login');
Route::post('/logout',  'Auth\LoginController@logout')->name('logout');
//Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');
//Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Roles
    Route::get('roles/', 'RolesController@index')->name('roles.index')->middleware('permission:roles.index');

    Route::get('roles/create', 'RolesController@create')->name('roles.create')->middleware('permission:roles.create');

    Route::post('roles/store', 'RolesController@store')->name('roles.store')->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RolesController@update')->name('roles.update')->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RolesController@show')->name('roles.show')->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RolesController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RolesController@edit')->name('roles.edit')->middleware('permission:roles.edit');


    //Persona Narutal
    Route::get('personaNarutal', 'PersonaNarutalController@index')->name('personaNarutal.index')->middleware('permission:personaNarutal.index');

    Route::get('personaNarutal/create', 'PersonaNarutalController@create')->name('personaNarutal.create')->middleware('permission:personaNarutal.create');

    Route::post('personaNarutal/store', 'PersonaNarutalController@store')->name('personaNarutal.store')->middleware('permission:personaNarutal.create');

    Route::put('personaNarutal/{personaNarutal}', 'PersonaNarutalController@update')->name('personaNarutal.update')->middleware('permission:personaNarutal.edit');

    Route::delete('personaNarutal/{id}', 'PersonaNarutalController@destroy')->name('personaNarutal.destroy')->middleware('permission:personaNarutal.destroy');

    Route::get('personaNarutal/{personaNarutal}/edit', 'PersonaNarutalController@edit')->name('personaNarutal.edit')->middleware('permission:personaNarutal.edit');

    Route::get('personaNarutal/excel', 'PersonaNarutalController@exportPersonasNatural')->name('personaNarutal.excel')->middleware('permission:personaNarutal.excel');

    Route::post('personaNarutal/import', 'PersonaNarutalController@import')->name('personaNarutal.import')->middleware('permission:personaNarutal.import');

    Route::get('personaNarutal/plantilla', 'PersonaNarutalController@download')->name('personaNarutal.plantilla')->middleware('permission:personaNarutal.plantilla');


    Route::get('ciudades/{id}', 'CiudadesController@loadCiudades')->name('loadCiudades');

    Route::get('codigoCiiu/{id}', 'ActividadesCiiuController@loadActividades')->name('codigoCiiu');

    //Persona Juridica
    Route::get('personaJuridica', 'PersonaJuridicaController@index')->name('personaJuridica.index')->middleware('permission:personaJuridica.index');

    Route::get('personaJuridica/create', 'PersonaJuridicaController@create')->name('personaJuridica.create')->middleware('permission:personaJuridica.create');

    Route::post('personaJuridica/store', 'PersonaJuridicaController@store')->name('personaJuridica.store')->middleware('permission:personaJuridica.create');

    Route::put('personaJuridica/{personaJuridica}', 'PersonaJuridicaController@update')->name('personaJuridica.update')->middleware('permission:personaJuridica.edit');

    Route::delete('personaJuridica/{personaJuridica}', 'PersonaJuridicaController@destroy')->name('personaJuridica.destroy')->middleware('permission:personaJuridica.destroy');

    Route::get('personaJuridica/{personaJuridica}/edit', 'PersonaJuridicaController@edit')->name('personaJuridica.edit')->middleware('permission:personaJuridica.edit');

    Route::get('personaJuridica/excel', 'PersonaJuridicaController@exportPersonasJuricas')->name('personaJuridica.excel')->middleware('permission:personaJuridica.excel');

    Route::get('ciudades/{id}', 'CiudadesController@loadCiudades')->name('loadCiudades');

    Route::get('codigoCiiu/{id}', 'ActividadesCiiuController@loadActividades')->name('codigoCiiu');

    //Persona Empleados
    Route::get('personaEmpleado', 'PersonaEmpleadoController@index')->name('personaEmpleado.index')->middleware('permission:personaEmpleado.index');

    Route::get('personaEmpleado/create', 'PersonaEmpleadoController@create')->name('personaEmpleado.create')->middleware('permission:personaEmpleado.create');

    Route::post('personaEmpleado/store', 'PersonaEmpleadoController@store')->name('personaEmpleado.store')->middleware('permission:personaEmpleado.create');

    Route::put('personaEmpleado/{personaEmpleado}', 'PersonaEmpleadoController@update')->name('personaEmpleado.update')->middleware('permission:personaEmpleado.edit');

    //Route::get('personaEmpleado/{personaEmpleado}', 'PersonaEmpleadoController@show')->name('personaEmpleado.show')->middleware('permission:personaEmpleado.show');

    Route::delete('personaEmpleado/{personaEmpleado}', 'PersonaEmpleadoController@destroy')->name('personaEmpleado.destroy')->middleware('permission:personaEmpleado.destroy');

    Route::get('personaEmpleado/{personaEmpleado}/edit', 'PersonaEmpleadoController@edit')->name('personaEmpleado.edit')->middleware('permission:personaEmpleado.edit');

    Route::get('personaEmpleado/excel', 'PersonaEmpleadoController@exportPersonasEmpleados')->name('personaEmpleado.excel')->middleware('permission:personaEmpleado.excel');


    Route::get('ciudades/{id}', 'CiudadesController@loadCiudades')->name('loadCiudades');

    Route::get('loadEmpleo/{id}', 'PersonaEmpleadoController@loadEmpleo')->name('loadEmpleo');

    //Consorciados
    Route::get('consorciados', 'ConsorciosUnionesTemporalesContoroller@index')->name('consorciados.index')->middleware('permission:consorciados.index');

    Route::get('consorciados/create', 'ConsorciosUnionesTemporalesContoroller@create')->name('consorciados.create')->middleware('permission:consorciados.create');

    Route::post('consorciados/store', 'ConsorciosUnionesTemporalesContoroller@store')->name('consorciados.store')->middleware('permission:consorciados.create');

    Route::put('consorciados/{consorciados}', 'ConsorciosUnionesTemporalesContoroller@update')->name('consorciados.update')->middleware('permission:consorciados.edit');

    Route::get('consorciados/{consorciados}', 'ConsorciosUnionesTemporalesContoroller@show')->name('consorciados.show')->middleware('permission:consorciados.show');

    Route::get('consorciados/{consorciados}/edit', 'ConsorciosUnionesTemporalesContoroller@edit')->name('consorciados.edit')->middleware('permission:consorciados.edit');

    Route::delete('consorciados/{consorciados}', 'ConsorciosUnionesTemporalesContoroller@destroy')->name('consorciados.destroy')->middleware('permission:consorciados.destroy');

    Route::delete('destroyEmpresa/{consorciados}', 'ConsorciosUnionesTemporalesContoroller@destroyEmpresa')->name('consorciados.destroyEmpresa')->middleware('permission:consorciados.destroyEmpresa');

    Route::put('editPorcetaje/{consorciados}', 'ConsorciosUnionesTemporalesContoroller@editPorcetaje')->name('consorciados.editPorcetaje')->middleware('permission:consorciados.editPorcetaje');


    Route::get('ciudades/{id}', 'CiudadesController@loadCiudades')->name('loadCiudades');

    Route::get('codigoCiiu/{id}', 'ActividadesCiiuController@loadActividades')->name('codigoCiiu');


    //EMPRESA
    Route::get('/', 'EmpresaController@index')->name('empresa.index')->middleware('permission:empresa.index');

    Route::get('empresa/create', 'EmpresaController@create')->name('empresa.create')->middleware('permission:empresa.create');

    Route::post('empresa/store', 'EmpresaController@store')->name('empresa.store')->middleware('permission:empresa.create');

    Route::put('empresa/{empresa}', 'EmpresaController@update')->name('empresa.update')->middleware('permission:empresa.edit');

    Route::get('empresa/{empresa}', 'EmpresaController@show')->name('empresa.show')->middleware('permission:empresa.show');

    Route::delete('empresa/{empresa}', 'EmpresaController@destroy')->name('empresa.destroy')->middleware('permission:empresa.destroy');

    Route::get('empresa/{empresa}/edit', 'EmpresaController@edit')->name('empresa.edit')->middleware('permission:empresa.edit');

    //users
    Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');

    Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');

    Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

    //**TIPO DOCUMENTO */
    Route::get('tipoDocumento', 'TipoDocumentoController@index')->name('tipoDocumento.index')->middleware('permission:tipoDocumento.index');

    Route::get('tipoDocumento/create', 'TipoDocumentoController@create')->name('tipoDocumento.create')->middleware('permission:tipoDocumento.create');

    Route::post('tipoDocumento/store', 'TipoDocumentoController@store')->name('tipoDocumento.store')->middleware('permission:tipoDocumento.create');

    Route::put('tipoDocumento/{tipodocumento}', 'TipoDocumentoController@update')->name('tipoDocumento.update')->middleware('permission:tipoDocumento.edit');

    Route::get('tipoDocumento/{tipodocumento}', 'TipoDocumentoController@show')->name('tipoDocumento.show')->middleware('permission:tipoDocumento.show');

    Route::delete('tipoDocumento/{tipodocumento}', 'TipoDocumentoController@destroy')->name('tipoDocumento.destroy')->middleware('permission:tipoDocumento.destroy');

    Route::get('tipoDocumento/{tipodocumento}/edit', 'TipoDocumentoController@edit')->name('tipoDocumento.edit')->middleware('permission:tipoDocumento.edit');

    /*** CLASE PERSONA */
    Route::get('clasePersona', 'ClasePersonaController@index')->name('clasePersona.index')->middleware('permission:clasePersona.index');

    Route::get('clasePersona/create', 'ClasePersonaController@create')->name('clasePersona.create')->middleware('permission:clasePersona.create');

    Route::post('clasePersona/store', 'ClasePersonaController@store')->name('clasePersona.store')->middleware('permission:clasePersona.create');

    Route::put('clasePersona/{clasePersona}', 'ClasePersonaController@update')->name('clasePersona.update')->middleware('permission:clasePersona.edit');

    Route::get('clasePersona/{clasePersona}', 'ClasePersonaController@show')->name('clasePersona.show')->middleware('permission:clasePersona.show');

    Route::delete('clasePersona/{clasePersona}', 'ClasePersonaController@destroy')->name('clasePersona.destroy')->middleware('permission:clasePersona.destroy');

    Route::get('clasePersona/{clasePersona}/edit', 'ClasePersonaController@edit')->name('clasePersona.edit')->middleware('permission:clasePersona.edit');

    /**CODIGO EMPLEO */
    Route::get('codigoEmpleo', 'CodigoEmpleoController@index')->name('codigoEmpleo.index')->middleware('permission:codigoEmpleo.index');

    Route::get('codigoEmpleo/create', 'CodigoEmpleoController@create')->name('codigoEmpleo.create')->middleware('permission:codigoEmpleo.create');

    Route::post('codigoEmpleo/store', 'CodigoEmpleoController@store')->name('codigoEmpleo.store')->middleware('permission:codigoEmpleo.create');

    Route::put('codigoEmpleo/{codigoEmpleo}', 'CodigoEmpleoController@update')->name('codigoEmpleo.update')->middleware('permission:codigoEmpleo.edit');

    Route::get('codigoEmpleo/{codigoEmpleo}', 'CodigoEmpleoController@show')->name('codigoEmpleo.show')->middleware('permission:codigoEmpleo.show');

    Route::delete('codigoEmpleo/{codigoEmpleo}', 'CodigoEmpleoController@destroy')->name('codigoEmpleo.destroy')->middleware('permission:codigoEmpleo.destroy');

    Route::get('codigoEmpleo/{codigoEmpleo}/edit', 'CodigoEmpleoController@edit')->name('codigoEmpleo.edit')->middleware('permission:codigoEmpleo.edit');


    /**NIVEL EMPLEO */
    Route::get('nivelEmpleo', 'NivelEmpleoController@index')->name('nivelEmpleo.index')->middleware('permission:nivelEmpleo.index');

    Route::get('nivelEmpleo/create', 'NivelEmpleoController@create')->name('nivelEmpleo.create')->middleware('permission:nivelEmpleo.create');

    Route::post('nivelEmpleo/store', 'NivelEmpleoController@store')->name('nivelEmpleo.store')->middleware('permission:nivelEmpleo.create');

    Route::put('nivelEmpleo/{nivelEmpleo}', 'NivelEmpleoController@update')->name('nivelEmpleo.update')->middleware('permission:nivelEmpleo.edit');

    Route::get('nivelEmpleo/{nivelEmpleo}', 'NivelEmpleoController@show')->name('nivelEmpleo.show')->middleware('permission:nivelEmpleo.show');

    Route::delete('nivelEmpleo/{nivelEmpleo}', 'NivelEmpleoController@destroy')->name('nivelEmpleo.destroy')->middleware('permission:nivelEmpleo.destroy');

    Route::get('nivelEmpleo/{nivelEmpleo}/edit', 'NivelEmpleoController@edit')->name('nivelEmpleo.edit')->middleware('permission:nivelEmpleo.edit');


    /**REGIMEN TRIBUTARIO */
    Route::get('regimenTributario', 'RegimenTributarioController@index')->name('regimenTributario.index')->middleware('permission:regimenTributario.index');

    Route::get('regimenTributario/create', 'RegimenTributarioController@create')->name('regimenTributario.create')->middleware('permission:regimenTributario.create');

    Route::post('regimenTributario/store', 'RegimenTributarioController@store')->name('regimenTributario.store')->middleware('permission:regimenTributario.create');

    Route::put('regimenTributario/{regimenTributario}', 'RegimenTributarioController@update')->name('regimenTributario.update')->middleware('permission:regimenTributario.edit');

    Route::get('regimenTributario/{regimenTributario}', 'RegimenTributarioController@show')->name('regimenTributario.show')->middleware('permission:regimenTributario.show');

    Route::delete('regimenTributario/{regimenTributario}', 'RegimenTributarioController@destroy')->name('regimenTributario.destroy')->middleware('permission:regimenTributario.destroy');

    Route::get('regimenTributario/{regimenTributario}/edit', 'RegimenTributarioController@edit')->name('regimenTributario.edit')->middleware('permission:regimenTributario.edit');

    /**TIPO VINCULACION */
    Route::get('tipoVinculacion', 'TipoVinculacionController@index')->name('tipoVinculacion.index')->middleware('permission:tipoVinculacion.index');

    Route::get('tipoVinculacion/create', 'TipoVinculacionController@create')->name('tipoVinculacion.create')->middleware('permission:tipoVinculacion.create');

    Route::post('tipoVinculacion/store', 'TipoVinculacionController@store')->name('tipoVinculacion.store')->middleware('permission:tipoVinculacion.create');

    Route::put('tipoVinculacion/{tipoVinculacion}', 'TipoVinculacionController@update')->name('tipoVinculacion.update')->middleware('permission:tipoVinculacion.edit');

    Route::get('tipoVinculacion/{tipoVinculacion}', 'TipoVinculacionController@show')->name('tipoVinculacion.show')->middleware('permission:tipoVinculacion.show');

    Route::delete('tipoVinculacion/{tipoVinculacion}', 'TipoVinculacionController@destroy')->name('tipoVinculacion.destroy')->middleware('permission:tipoVinculacion.destroy');

    Route::get('tipoVinculacion/{tipoVinculacion}/edit', 'TipoVinculacionController@edit')->name('tipoVinculacion.edit')->middleware('permission:tipoVinculacion.edit');

    /**UNIDAD EJECUTAR*/
    Route::get('unidadEjecutar', 'EjecutaraController@index')->name('unidadEjecutar.index')->middleware('permission:unidadEjecutar.index');

    Route::get('unidadEjecutar/create', 'EjecutaraController@create')->name('unidadEjecutar.create')->middleware('permission:unidadEjecutar.create');

    Route::post('unidadEjecutar/store', 'EjecutaraController@store')->name('unidadEjecutar.store')->middleware('permission:unidadEjecutar.create');

    Route::put('unidadEjecutar/{unidadEjecutar}', 'EjecutaraController@update')->name('unidadEjecutar.update')->middleware('permission:unidadEjecutar.edit');

    Route::get('unidadEjecutar/{unidadEjecutar}', 'EjecutaraController@show')->name('unidadEjecutar.show')->middleware('permission:unidadEjecutar.show');

    Route::delete('unidadEjecutar/{unidadEjecutar}', 'EjecutaraController@destroy')->name('unidadEjecutar.destroy')->middleware('permission:unidadEjecutar.destroy');

    Route::get('unidadEjecutar/{unidadEjecutar}/edit', 'EjecutaraController@edit')->name('unidadEjecutar.edit')->middleware('permission:unidadEjecutar.edit');

    //DEPENDENCIAS
    Route::get('dependecias', 'DependenciasController@index')->name('dependecias.index')->middleware('permission:dependecias.index');

    Route::get('dependecias/create', 'DependenciasController@create')->name('dependecias.create')->middleware('permission:dependecias.create');

    Route::post('dependecias/store', 'DependenciasController@store')->name('dependecias.store')->middleware('permission:dependecias.create');

    Route::put('dependecias/{dependecias}', 'DependenciasController@update')->name('dependecias.update')->middleware('permission:dependecias.edit');

    Route::get('dependecias/{dependecias}', 'DependenciasController@show')->name('dependecias.show')->middleware('permission:dependecias.show');

    Route::delete('dependecias/{dependecias}', 'DependenciasController@destroy')->name('dependecias.destroy')->middleware('permission:dependecias.destroy');

    Route::get('dependecias/{dependecias}/edit', 'DependenciasController@edit')->name('dependecias.edit')->middleware('permission:dependecias.edit');

    //BINES Y SERVICIOS
    Route::get('bienes', 'BienesyServiciosController@index')->name('bienes.index')->middleware('permission:bienes.index');

    Route::get('bienes/create', 'BienesyServiciosController@create')->name('bienes.create')->middleware('permission:bienes.create');

    Route::post('bienes/store', 'BienesyServiciosController@store')->name('bienes.store')->middleware('permission:bienes.create');

    Route::put('bienes/{bienes}', 'BienesyServiciosController@update')->name('bienes.update')->middleware('permission:bienes.edit');

    Route::get('bienes/{bienes}', 'BienesyServiciosController@show')->name('bienes.show')->middleware('permission:bienes.show');

    Route::delete('bienes/{bienes}', 'BienesyServiciosController@destroy')->name('bienes.destroy')->middleware('permission:bienes.destroy');

    Route::get('bienes/{bienes}/edit', 'BienesyServiciosController@edit')->name('bienes.edit')->middleware('permission:bienes.edit');

    /**PUC*/
    Route::get('puc', 'planCuentasPUCController@index')->name('puc.index')->middleware('permission:puc.index');

    Route::post('puc/store', 'planCuentasPUCController@store')->name('puc.store')->middleware('permission:puc.create');

    Route::put('puc/{puc}', 'planCuentasPUCController@update')->name('puc.update')->middleware('permission:puc.edit');

    Route::delete('puc/{puc}', 'planCuentasPUCController@destroy')->name('puc.destroy')->middleware('permission:puc.destroy');

    Route::get('puc/{puc}/edit', 'planCuentasPUCController@edit')->name('puc.edit')->middleware('permission:puc.edit');

    Route::get('puc/create/{cuenta?}', 'planCuentasPUCController@create')->name('puc.create')->middleware('permission:puc.create');

    Route::get('puc/excel', 'planCuentasPUCController@exportPuc')->name('puc.excel')->middleware('permission:puc.excel');

    Route::get('loadFormato/{id}', 'loadFormatosController@loadFormato')->name('loadFormato');

    Route::post('puc/import', 'planCuentasPUCController@import')->name('puc.import')->middleware('permission:puc.import');

    Route::get('puc/plantilla', 'planCuentasPUCController@downloadPlantilla')->name('puc.plantilla')->middleware('permission:puc.plantilla');


    /**CUENTAS INSTITUCIONALES*/
    Route::get('cuentasInstitucionales', 'CuentaInstitucionalController@index')->name('cuentasInstitucionales.index')->middleware('permission:cuentasInstitucionales.index');

    Route::get('cuentasInstitucionales/create', 'CuentaInstitucionalController@create')->name('cuentasInstitucionales.create')->middleware('permission:cuentasInstitucionales.create');

    Route::post('cuentasInstitucionales/store', 'CuentaInstitucionalController@store')->name('cuentasInstitucionales.store')->middleware('permission:cuentasInstitucionales.create');

    Route::put('cuentasInstitucionales/{cuenta}', 'CuentaInstitucionalController@update')->name('cuentasInstitucionales.update')->middleware('permission:cuentasInstitucionales.edit');

    Route::delete('cuentasInstitucionales/{cuenta}', 'CuentaInstitucionalController@destroy')->name('cuentasInstitucionales.destroy')->middleware('permission:cuentasInstitucionales.destroy');

    Route::get('cuentasInstitucionales/{cuenta}/edit', 'CuentaInstitucionalController@edit')->name('cuentasInstitucionales.edit')->middleware('permission:cuentasInstitucionales.edit');

    Route::get('cuentasInstitucionales/excel', 'CuentaInstitucionalController@exportCuentasInstitucionales')->name('cuentasInstitucionales.excel')->middleware('permission:cuentasInstitucionales.excel');

    //Route::get('cuentaInstitucional/excel/{cuenta}', 'CuentaInstitucionalController@exportCuentaInstitucional')->name('cuentaInstitucional.excel')->middleware('permission:cuentaInstitucional.excel');
    Route::get('cuentaInstitucional/pdf/{id}', 'CuentaInstitucionalController@pdf')->name('cuentaInstitucional.Pdf')->middleware('permission:cuentaInstitucional.Pdf');;

    /**SEDES*/
    Route::get('sede', 'SedeController@index')->name('sede.index')->middleware('permission:sede.index');

    Route::get('sede/create', 'SedeController@create')->name('sede.create')->middleware('permission:sede.create');

    Route::post('sede/store', 'SedeController@store')->name('sede.store')->middleware('permission:sede.create');

    Route::put('sede/{id}', 'SedeController@update')->name('sede.update')->middleware('permission:sede.edit');

    Route::delete('sede/{id}', 'SedeController@destroy')->name('sede.destroy')->middleware('permission:sede.destroy');

    Route::get('sede/{id}/edit', 'SedeController@edit')->name('sede.edit')->middleware('permission:sede.edit');

    Route::get('sede/excel', 'SedeController@excel')->name('sede.excel')->middleware('permission:sede.excel');


    /**SUB SEDES*/
    Route::get('subSede', 'SubSedeController@index')->name('subSede.index')->middleware('permission:subSede.index');

    Route::get('subSede/create', 'SubSedeController@create')->name('subSede.create')->middleware('permission:subSede.create');

    Route::post('subSede/store', 'SubSedeController@store')->name('subSede.store')->middleware('permission:subSede.create');

    Route::put('subSede/{id}', 'SubSedeController@update')->name('subSede.update')->middleware('permission:subSede.edit');

    Route::delete('subSede/{id}', 'SubSedeController@destroy')->name('subSede.destroy')->middleware('permission:subSede.destroy');

    Route::get('subSede/{id}/edit', 'SubSedeController@edit')->name('subSede.edit')->middleware('permission:subSede.edit');

    Route::get('subSede/excel', 'SubSedeController@excel')->name('subSede.excel')->middleware('permission:subSede.excel');

    /**NIFF*/
    Route::get('niff', 'NiffController@index')->name('niff.index')->middleware('permission:niff.index');

    Route::put('niff/{niff}', 'NiffController@update')->name('niff.update')->middleware('permission:niff.edit');

    Route::delete('niff/{niff}', 'NiffController@destroy')->name('niff.destroy')->middleware('permission:niff.destroy');

    Route::get('niff/{niff}/edit', 'NiffController@edit')->name('niff.edit')->middleware('permission:niff.edit');

    Route::get('niff/excel', 'NiffController@exportniff')->name('niff.excel')->middleware('permission:niff.excel');

    Route::get('loadFormato/{id}', 'loadFormatosController@loadFormato')->name('loadFormato');

    Route::post('niff/import', 'NiffController@import')->name('niff.import')->middleware('permission:niff.import');

    Route::get('niff/plantilla', 'NiffController@downloadPlantilla')->name('niff.plantilla')->middleware('permission:niff.plantilla');

    /**PANEL DE CONTROL*/
    Route::get('panel', 'ComprobantesController@index')->name('panel.index')->middleware('permission:panel.index');

    Route::get('panel/create', 'ComprobantesController@create')->name('panel.create')->middleware('permission:panel.create');

    Route::post('panel/store', 'ComprobantesController@store')->name('panel.store')->middleware('permission:panel.create');

    Route::put('panel/{panel}', 'ComprobantesController@update')->name('panel.update')->middleware('permission:panel.edit');

    Route::delete('panel/{presupuesto}', 'ComprobantesController@destroyTipoPresupuesto')->name('panel.destroyTipoPresupuesto')->middleware('permission:panel.destroyTipoPresupuesto');

    Route::delete('panelPresupuesto/{panel}', 'ComprobantesController@destroyTipoPresupuesto')->name('panelPresupuesto.destroyTipoPresupuesto')->middleware('permission:panelPresupuesto.destroyTipoPresupuesto');

    Route::delete('panel/{panel}', 'ComprobantesController@destroy')->name('panel.destroy')->middleware('permission:panel.destroy');

    Route::get('panel/{panel}/edit', 'ComprobantesController@edit')->name('panel.edit')->middleware('permission:panel.edit');

    /**RETENCIONES*/
    Route::get('retenciones', 'RetencionesController@index')->name('retenciones.index')->middleware('permission:retenciones.index');

    Route::get('retenciones/create', 'RetencionesController@create')->name('retenciones.create')->middleware('permission:retenciones.create');

    Route::post('retenciones/store', 'RetencionesController@store')->name('retenciones.store')->middleware('permission:retenciones.create');

    Route::put('retenciones/{retenciones}', 'RetencionesController@update')->name('retenciones.update')->middleware('permission:retenciones.edit');

    Route::delete('retenciones/{retenciones}', 'RetencionesController@destroy')->name('retenciones.destroy')->middleware('permission:retenciones.destroy');

    Route::delete('eliminarCuenta/{retenciones}', 'RetencionesController@eliminarCuenta')->name('retenciones.eliminarCuenta')->middleware('permission:retenciones.eliminarCuenta');

    Route::get('retenciones/{retenciones}/edit', 'RetencionesController@edit')->name('retenciones.edit')->middleware('permission:retenciones.edit');

    Route::get('retenciones/excel', 'RetencionesController@exportRetencion')->name('exportRetencion.excel')->middleware('permission:exportRetencion.excel');



    /**TRASNSACCIONES*/
    Route::get('transaccion', 'TrasaccionesController@index')->name('transaccion.index')->middleware('permission:transaccion.index');

    Route::get('transaccion/create', 'TrasaccionesController@create')->name('transaccion.create')->middleware('permission:transaccion.create');

    Route::post('transaccion/store', 'TrasaccionesController@store')->name('transaccion.store')->middleware('permission:transaccion.create');

    Route::put('transaccion/{id}', 'TrasaccionesController@anularTransaccion')->name('transaccion.anularTransaccion')->middleware('permission:transaccion.anularTransaccion');

    Route::put('transaccion/{transaccion}/editTransaccionNoContabilizada', 'TrasaccionesController@editTransaccionNoContabilizada')->name('transaccion.editTransaccionNoContabilizada')->middleware('permission:transaccion.editTransaccionNoContabilizada');

    Route::get('transaccion/{transaccion}/edit', 'TrasaccionesController@edit')->name('transaccion.edit')->middleware('permission:transaccion.edit');

    Route::put('transaccionEditar/{transaccion}', 'TrasaccionesEditarController@update')->name('transaccionEditar.update')->middleware('permission:transaccion.transaccionEditar');

    Route::put('transaccionPlantilla/{plantilla}', 'TrasaccionesEditarController@estadoPlantilla')->name('transaccion.estadoPlantilla')->middleware('permission:transaccion.estadoPlantilla');

    Route::get('transaccion/{transaccion}/editSoporte', 'TrasaccionesController@editSoporte')->name('transaccion.editSoporte')->middleware('permission:transaccion.editSoporte');

    Route::put('transaccion/{transaccion}', 'TrasaccionesController@update')->name('transaccion.update')->middleware('permission:transaccion.edit');

    Route::get('transaccion/export/{id}', 'TrasaccionesController@export')->name('transaccion.export')->middleware('permission:transaccion.import');

    Route::post('transaccion/import', 'TrasaccionesController@import')->name('transaccion.import')->middleware('permission:transaccion.import');

    Route::get('transaccion/{transaccion}/duplicate', 'TrasaccionesController@duplicate')->name('transaccion.duplicate')->middleware('permission:transaccion.duplicate');

    Route::get('transaccion/{planConta}/print', 'TrasaccionesController@printTrans')->name('transaccion.printTrans')->middleware('permission:transaccion.printTrans');

    Route::put('transaccionPlantilla/{transaccion}', 'TrasaccionesController@updatePlantilla')->name('transaccion.updatePlantilla')->middleware('permission:transaccion.updatePlantilla');


    Route::get('transaccion/{id}', 'TipoPresupuestoController@loadTipoPresupuesto')->name('loadTipoPresupuesto');

    Route::get('transaccionPlantilla/plantilla', 'TrasaccionesController@downloadPlantilla')->name('transaccion.plantilla')->middleware('permission:transaccion.plantilla');

    Route::get('transaccion/loadNiif/{id}', 'TrasaccionesController@loadNiif')->name('transaccion.loadNiif');

    Route::get('puc/loadPuc', 'TrasaccionesController@pucLoad')->name('puc.pucLoad');

    Route::get('puc/pucLoadAjax', 'TrasaccionesController@pucLoadAjax')->name('puc.pucLoadAjax');

    Route::get('puc/loadPucPrueba/{id}', 'TrasaccionesController@pucLoadPrueba')->name('puc.pucLoadPrueba');

    Route::post('transaccion/filtroFechas/', 'TrasaccionesController@filterDate')->name('transaccion.filtroFechas');


    /**CIERRES*/
    Route::get('cierres', 'CierresController@index')->name('cierres.index')->middleware('permission:cierres.index');

    Route::get('cierres/create', 'CierresController@create')->name('cierres.create')->middleware('permission:cierres.create');

    Route::post('cierres/store', 'CierresController@store')->name('cierres.store')->middleware('permission:cierres.create');

    Route::put('cierres/{cierres}', 'CierresController@update')->name('cierres.update')->middleware('permission:cierres.edit');

    Route::delete('cierres/{cierres}', 'CierresController@destroy')->name('cierres.destroy')->middleware('permission:cierres.destroy');

    Route::get('cierres/{cierres}/edit', 'CierresController@edit')->name('cierres.edit')->middleware('permission:descuentos.edit');

    Route::put('cierresConcepto/{cierres}', 'CierresController@updateConcepto')->name('cierres.updateConcepto')->middleware('permission:updateConcepto');

    Route::delete('cierresConcepto/{cierres}', 'CierresController@destroyConcepto')->name('cierres.destroyConcepto')->middleware('permission:destroyConcepto');

    /**LIBROS CONTALBES*/

    Route::get('librosAuxiliar', 'LibrosContablesController@getLibrosAuxiliar')
            ->name('librosAuxiliar.getLibrosAuxiliar')
            ->middleware('permission:librosAuxiliar.getLibrosAuxiliar');

    Route::post('librosAuxiliar/reporte', 'LibrosContablesController@filterLibrosAuxiliar')
            ->name('librosAuxiliar.filterLibrosAuxiliar')
            ->middleware('permission:librosAuxiliar.filterLibrosAuxiliar');

    Route::get('balancePrueba', 'LibrosContablesController@getBalancePrueba')->name('balancePrueba.getBalancePrueba')->middleware('permission:balancePrueba.getBalancePrueba');

    Route::post('balancePrueba/reporte', 'LibrosContablesController@filterBalancePrueba')->name('balancePrueba.filterBalancePrueba')->middleware('permission:balancePrueba.filterBalancePrueba');

    Route::get('libroMayor', 'LibrosContablesController@getLibroMayor')->name('libroMayor.getLibroMayor')->middleware('permission:libroMayor.getLibroMayor');

    Route::post('libroMayor/reporte', 'LibrosContablesController@filterLibroMayor')->name('libroMayor.filterLibroMayor')->middleware('permission:libroMayor.filterLibroMayor');

    /**MACROPROCESOS BANCARIOS*/

    Route::get('macroProcesos', 'MacroprocesosBancariosController@index')->name('macroProcesos.index')->middleware('permission:macroProcesos.index');

    Route::get('macroProcesos/create', 'MacroprocesosBancariosController@create')->name('macroProcesos.create')->middleware('permission:macroProcesos.create');

    Route::post('macroProcesos/store', 'MacroprocesosBancariosController@store')->name('macroProcesos.store')->middleware('permission:macroProcesos.create');

    Route::get('macroProcesos/{id}/edit', 'MacroprocesosBancariosController@edit')->name('macroProcesos.edit')->middleware('permission:macroProcesos.edit');

    Route::put('macroProcesos/{id}', 'MacroprocesosBancariosController@update')->name('macroProcesos.update')->middleware('permission:macroProcesos.edit');

    Route::delete('macroProcesos/{id}', 'MacroprocesosBancariosController@destroy')->name('macroProcesos.destroy')->middleware('permission:macroProcesos.destroy');

    Route::post('macroProcesos/import', 'MacroprocesosBancariosController@import')->name('macroProcesos.import')->middleware('permission:macroProcesos.import');

    Route::get('macroProcesos/plantilla', 'MacroprocesosBancariosController@downloadPlantilla')->name('macroProcesos.plantilla')->middleware('permission:macroProcesos.plantilla');


    /**PRESUPUESNTO DE GASTO*/

    /**NIVEL DE PRESUPUESTO*/
    
    /**ADICOINES GASTOS*/

    /**REDUCCIONES GASTOS*/
    
    /**CREDITOS GASTOS*/

    /**CONTRA CREDITOS GASTOS*/
    
    /**APLAZAMIENTOS GASTOS*/
  
    /**DESPLAZAMIENTOS GASTOS*/
  
    /**HOMOLOGACIONES GASTOS*/
  

});





