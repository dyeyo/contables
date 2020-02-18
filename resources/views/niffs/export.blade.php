<h2>SE RECOMINEDA ANTES DE IMPORTAR EL ARCHIVO ELIMINAR DESDE LA FILA 1 A LA 3</h2>
<h4>Tipo de naturalza 1 para Superior 2 para Detalle</h4>
<table>
    <thead>
    <tr>
        <th style="background-color:#ffef9c">ID</th>
        <th style="background-color:#ffef9c">Codigo de Cuenta</th>
        <th style="background-color:#ffef9c">Nombre de Cuenta</th>
        <th style="background-color:#ffef9c">Año</th>
        <th style="background-color:#ffef9c">Codigo CGC NIFF</th>
        <th style="background-color:#ffef9c">Nombre NIFF</th>
        <th style="background-color:#ffef9c">Tipo de Cuenta</th>
        <th style="background-color:#ffef9c">Naturaleza de Cuenta</th>
        <th style="background-color:#ffef9c">Nivel</th>
    </tr>
    </thead>
    <tbody>
    @foreach($niffs as $item)
        <tr>
            <td>{{ $item->id}}</td>
            <td>{{ $item->codigocuenta}}</td>
            <td>{{ $item->nombrecuenta}}</td>
            <td @if ($item->codigoNiff == '') style="background-color:#ffc7ce"@endif >{{ $item->codigoNiff}}</td>
            <td @if ($item->nombreNiff == '') style="background-color:#ffc7ce"@endif >{{ $item->nombreNiff}}</td>
            <td>{{ $item->tipoCuenta_id}}</td>
            <td>{{ $item->naturalezaCuenta}}</td>
            <td>{{ $item->nivel}}</td>
           {{-- @else
                <td>{{ $item->nombreNiff}}</td>
                <td>{{ $item->codigoNiff}}</td>
            @endif--}}
        </tr>
    @endforeach
    </tbody>
</table>