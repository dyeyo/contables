<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
    <h1 class="text-center text-primary">EMPRESA</h1>
    <h3>{{\Carbon\Carbon::now()}}</h3>
    <hr>
    <table class="table ">
        <tr>
            <th class="table-secondary">Código de Cuenta</th>
            <th class="table-secondary">Código Superior</th>
            <th class="table-secondary">Nombre de Cuenta</th>
            <th class="table-secondary">Tipo de Cuenta</th>
        </tr>
        <tr>
            <td><b>{{$puc->codigoCuenta}}</b></td>
            <td><b>{{$puc->codigoSuperior}}</b></td>
            <td><b>{{$puc->nombreCuenta}}</b></td>
            <td><b>{{$puc->tipoCuenta}}</b></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th class="table-secondary">Cuenta</th>
            <th class="table-secondary">Número de Cuenta</th>
            <th class="table-secondary">Tipo de Cuenta Bancaria</th>
            <th class="table-secondary">Descripción</th>
        </tr>
        <tr>
            <td><b>{{$puc->tipoCuenta}}</b></td>
            <td><b>{{$puc->numeroCuenta}}</b></td>
            <td><b>{{$puc->CuentaCoNC}}</b></td>
            <td><b>{{$puc->descripcion}}</b></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th class="table-secondary">Situacion de Fondos</th>
            <th class="table-secondary">Uso de Cuenta Bancaria</th>
            <th class="table-secondary">Posicion Clasificador de Presupuestal Gastos</th>
            <th class="table-secondary">Posicion Clasificador de Presupuestal Ingresos</th>
        </tr>
        <tr>
            <td><b>{{$puc->situacionFondos}}</b></td>
            <td><b>{{$puc->usocuentaBancaria}}</b></td>
            <td><b>{{$puc->posicionClasificadorPresupuestalGastos}}</b></td>
            <td><b>{{$puc->posicionClasificadorPresupuestalIngresos}}</b></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th class="table-secondary">Codigo Interno</th>
            <th class="table-secondary">Codigo Sucursal</th>
            <th class="table-secondary">Porcentaje</th>
            <th class="table-secondary">Fuente financiacion SIA</th>
        </tr>
        <tr>
            <td><b>{{$puc->codigoInterno}}</b></td>
            <td><b>{{$puc->codigoSucursal}}</b></td>
            <td><b>{{$puc->porcentaje}}</b></td>
            <td><b>{{$puc->fuentefinanciacionSIA_id}}</b></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th class="table-secondary">Codigo Entidad Financiera SIA</th>
            <th class="table-secondary">Cuenta Maestra</th>
            <th class="table-secondary">Concepto Dian</th>
            <th class="table-secondary">Formato Dian</th>
        </tr>
        <tr>
            <td><b>{{$puc->codigoEntidadFinancieraSIA_id}}</b></td>
            <td><b>{{$puc->cuentaMaestra_id}}</b></td>
            <td><b>{{$puc->futExcedentesLiquidez_id}}</b></td>
            <td><b>{{$puc->conceptoDian_id}}</b></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th class="table-secondary">Formato Dian</th>
            <th class="table-secondary">Opciones Privilegios</th>
        </tr>
        <tr>
            <td><b>{{$puc->formatoDian_id}}</b></td>
            <td><b>{{$puc->opcionesPrivilegios_id}}</b></td>
        </tr>
    </table>
   {{-- <div id="features">

        <div class="feature">
            <h2>Web fonts</h2>
            <p>Support for custom fonts: otf, ttf and woff.</p>
        </div>

        <div class="feature">
            <h2>Base64</h2>
            <p>Base64 support for images and fonts.</p>
        </div>

        <div class="feature">
            <h2>Base64</h2>
            <p>Base64 support for images and fonts.</p>
        </div>

        <br class="clear" />

        <div class="feature">
            <h2>Font kerning</h2>
            <p>Font in your PDF will have perfect letter spacing.</p>
        </div>

        <div class="feature">
            <h2>Header/Footer</h2>
            <p>Support for real headers and footers.</p>
        </div>


        <br class="clear" />

        <div class="feature">
            <h2>CSS and Javascript</h2>
            <p>HTML PDF API supports CSS2, CSS3 (partially) and Javascript.</p>
        </div>

        <div class="feature">
            <h2>URL, FILE or HTML string</h2>
            <p>We support all conversion types.</p>
        </div>


        <br class="clear" />

        <div class="feature">
            <h2>RESTFUL API</h2>
            <p>Our PDF API supports any language that can send HTTP requests.</p>
        </div>

        <div class="feature">
            <h2>Assets</h2>
            <p>Speed up PDF exports by uploading frequently used files to the server.</p>
        </div>


    </div>--}}
</body>
</html>
