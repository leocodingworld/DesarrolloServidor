@extends('plantillas.plantilla1')

@section('titulo')
	{{ $titulo }}
@endsection

@section('cabecera')
	{{ $cabecera }}
@endsection

@section('contenido')
<form action="./gestion.php" method="POST">
	<table>
        <tr>
            <th></th>
            <th>Matrícula</th>
            <th>Marca</th>
            <th>Descripción</th>
            <th>PVP</th>
            <th>Tipo</th>
            <th>Vendido</th>
            <th></th>
        </tr>
        @foreach ($vehiculos as $vehiculo) 
            <tr>
                <td>
                    @if (!$vehiculo -> getVendido())
                        <button name="rebajar" value="{{ $vehiculo -> getMatricula()}}">Rebajar Precio</button>
                    @endif
                </td>
                <td>{{ $vehiculo -> getMatricula() }}</td>
                <td>{{ $vehiculo -> getMarca() }}</td>
                <td>{{ $vehiculo -> getDescripcion() }}</td>
                <td>{{ $vehiculo -> getPvp() }}</td>
                <td>{{ $vehiculo -> getTipo() }}</td>
                <td>{{ $vehiculo -> getVendido() }}</td>
                <td>
                   @if ( $vehiculo -> getVendido())
                       <button formaction="./detalle.php" name="detalle" value="{{ $vehiculo -> getMatricula() }}">Detalle</button>
                   @endif
                </td>
            </tr>
        @endforeach
    </table>
</form>
@endsection