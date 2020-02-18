    <h1 style="background: #ffb3a4">ANTES DE IMPORTAR POR FAVOR ELIMINAR LA FILA 1 Y 3 POR FAVOR</h1>
    <h3>PARA DIGITAR EL PUC SE RECOMIENDA TENER LA PLANTILLA DE TODO EL PUC DE SU SISTEMA Y SOLO AGREGAR EL CAMPO ID</h3>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>FECHA DE MOVIMIENTO</th>
        <th>DOCUMENTO DE REFERENCIA</th>
        {{--<th>TERCERO</th>--}}
        <th>ID PUC</th>
        <th>DEBITO</th>
        <th>CREDITO</th>
        <th>TOTAL CREDITO</th>
        <th>TOTAL DEBITO</th>
        <th>DIFERENCIA</th>
    </tr>
    </thead>
    <tbody>
    @foreach($trans as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->fecha_movimiento }}</td>
            <td>{{ $item->docReferencia}}</td>
            {{--<td>{{ $item->tercero_id}}</td>--}}
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $item->totalDebito }}</td>
            <td>{{ $item->totalCredito }}</td>
            <td>{{ $item->diferencia }}</td>
        </tr>
    @endforeach
    </tbody>
</table>