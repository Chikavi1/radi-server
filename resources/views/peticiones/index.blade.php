@extends('layouts.app')


@section('content')
	<h2>Peticiones</h2>
	  <table class="responsive-table">
        <thead>
          <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>vivienda</th>
              <th>lugar dormir</th>
              <th>adoptado antes?</th>
              <th>los demas aceptan?</th>
              <th>medidas</th>
              <th>fecha</th>
              <th>Estado</th>
          </tr>
        </thead>

        <tbody>
        	@foreach($peticiones as $peticion)
          <tr>
            <td>{{ $peticion->id}}</td>
            <td>{{$peticion->nombre}}</td>
            <td>{{$peticion->telefono}}</td>
            <td>{{$peticion->vivienda}}</td>
            <td>{{$peticion->dormira}}</td>
            <td>{{$peticion->adoptado_anterior}}</td>
			<td>{{$peticion->acuerdo}}</td>
			<td>{{$peticion->medidas}}</td>
			<td>{{ $peticion->created_at }}</td>
      <td>{{ $peticion->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection