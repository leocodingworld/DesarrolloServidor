@extends('plantillas.plantilla1')

@section('titulo')
	{{ $titulo }}
@endsection

@section('header')
	{{ $header }}
@endsection

@section('content')
	<form action="crearjugador.php" method="post">
		<label for="nombre">Nombre</label><br/>
		<input type="text" name="nombre"><br/>

		<label for="apellidos">Apellidos</label><br/>
		<input type="text" name="apellidos"><br/>

		<label for="dorsal">Dorsal</label><br/>
		<input type="text" name="dorsal"><br/>

		<label for="posicion">Posicion</label><br/>
		<select name="posicion">
			@foreach ($puestos as $puesto)
				<option value="{{ $puesto -> getId() }}">{{ $puesto -> getNombre() }}</option>				
			@endforeach	
		</select><br/>

		<button type="submit" value="crear">Crear Jugador</button>
		<button type="reset" value="limpiar">Limpiar Campos</button>
		<button type="button" value="volver" href="jugadores.php">Volver</button>
		<button type="button">Generar Barcode</button>
	</form>
@endsection