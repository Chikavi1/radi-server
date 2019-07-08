@extends('layouts.app')

@section('content')
  
  <script type="text/javascript">
    
     $(document).ready(function(){
    $('.modal').modal();
  });
  </script>

	<h2 class="center-align">Aliados</h2>
	<p class="center-align"><a href="{{ route('aliados.create') }}" class="text-center">Agregar Aliado</a></p>

	 <table class="responsive-table">
        <thead>
          <tr>
          	<th></th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Domicilio</th>
              <th>Personal</th>
              <th>Horario</th>
          </tr>
        </thead>

        <tbody>
        	@foreach($aliados as $aliado)
          <tr>
          	<td> <img src="{{ $aliado->imagen }}" alt="" width="50" class="circle responsive-img"> </td>
            <td>{{$aliado->nombre}}</td>
            <td>{{$aliado->telefono}}</td>
            <td>{{$aliado->domicilio}}</td>
            <td>{{$aliado->personal}}</td>
            <td>{{$aliado->horario}}</td>
			<td>{{$aliado->promocion}}</td>
			<td><a href="{{ route('aliados.edit',$aliado->id) }}">Modificar</a>
				<a style="color:red;" class=" modal-trigger" href="#modal{{$aliado->id}}">Eliminar</a></td>
          </tr>
          <div id="modal{{$aliado->id}}" class="modal">
    <div class="modal-content">
      <h4>¿Estas seguro de eliminar {{ $aliado->nombre }} ?</h4>
       </div>
    <div class="modal-footer">
      <form method="POST" action="{{ route('aliados.destroy',$aliado->id) }}">
        <a href="#!" class="modal-close waves-effect waves-green blue-text btn-flat">Cancelar</a>
          @csrf
          @method('DELETE')
          <button class="btn red white-text" type="submit">Aceptar</button>
        </form>
    </div>
  </div>
          
          @endforeach
        </tbody>
      </table>
@endsection