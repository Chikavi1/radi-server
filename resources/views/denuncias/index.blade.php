@extends('layouts.app')


@section('content')
	<h2>Denuncias</h2>
	  <table>
        <thead>
          <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Descripcion</th>
              <th>Fecha</th>
              <th>Estado</th>
          </tr>
        </thead>

        <tbody>
        	@foreach($denuncias as $denuncia)
          <tr>
            <td>{{ $denuncia->id}}</td>
            <td>{{$denuncia->nombre}}</td>
            <td>{{$denuncia->telefono}}</td>
            <td>{{$denuncia->description}}</td>
            <td>{{$denuncia->created_at}}</td>
            <td>{{ $denuncia->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection