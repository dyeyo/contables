<table>
    <thead>
    <tr>
        <th>TIPO DE RETENCION</th>
        <th>CODIGO</th>
        <th>CONCEPTO</th>
        <th>NIT TERCERO BENEFICIARIO DEDUCCIÓN</th>
        <th>RAZON SOCIAL/ NOMBRES - APELLIDOS</th>
        <th>ORDEN TERRITORIAL</th>
        <th>MECANISMO</th>
        <th>MONTO MINIMO</th>
        <th>TARIFA</th>
    </tr>
    </thead>
    <tbody>
    @foreach($retenciones as $item)
        <tr>
            <td>{{ $item->tipoRetencion}}</td>
            <td>{{ $item->id}}</td>
            <td>{{ $item->concepto}}</td>
            <td>{{$item->numeroDocumento}} {{$item->nit}}</td>
            @if ($item->raz_social != null)
                <td>{{$item->raz_social}}</td>
            @else
                <td> {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}} {{$item->numeroDocumento}} </td>
            @endif
            <td>{{ $item->territorialidad}}</td>
            <td>{{ $item->mecanismo}}</td>
            <td>{{ $item->monto_minimo}}</td>
            <td>{{ $item->valor_fijo}}</td>
        </tr>
    @endforeach
    </tbody>
</table>