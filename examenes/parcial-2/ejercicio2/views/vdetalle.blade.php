@extends('plantillas.plantilla1')

@section('titulo')
	{{ $titulo }}
@endsection

@section('cabecera')
	{{ $cabecera }}
@endsection

@section('contenido')
    <table>
        <tr>
            <td>Matricula</td>
            <td>{{ $vehiculo -> getMatricula() }}</td>
        </tr>
        <tr>
            <td>Cliente</td>
            <td>{{ $vehiculo -> getCliente() }}</td>
        </tr>
        <tr>
            <td>Couta Mensual</td>
            <td>{{ $vehiculo -> getCuota() }}</td>
        </tr>
        <tr>
            <td>Fecha Compra</td>
            <td>{{ $vehiculo -> getFechaCompra() }}</td>
        </tr>
        <tr>
            <td>Saldo Pendiente</td>
            <td>{{ $vehiculo -> getPendiente() }}</td>
        </tr>
    </table>
@endsection