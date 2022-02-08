@extends('plantillas.plantilla1')

@section('titulo')
	{{ $titulo }}
@endsection

@section('cabecera')
	{{ $cabecera }}
@endsection

@section('content')

<table>
	<tr>
		<th>Id Jugador</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Dorsal</th>
		<th>Posicion</th>
		<th>Código</th>
		<th>Código de Barras</th>
	</tr>
	
	@foreach ($jugadores as $jugador)
		<tr>
			<td>{{ $jugador -> getId() }}</td>
			<td>{{ $jugador -> getNombre() }}</td>
			<td>{{ $jugador -> getApellidos() }}</td>
			<td>{{ $jugador -> getDorsal() }}</td>
			<td>{{ $jugador -> getPosicion() }}</td>
			<td>{{ $jugador -> getBarcode() }}</td>
			{{-- <td>{{ DNS1D::getbarcodeSVG($jugador -> getBarcode(), "EAN21") }}</td>				 --}}
		</tr>	
	@endforeach
	
</table>
@endsection