@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script src="/vendor/ckeditor-2/ckeditor.js"></script>
<script src="/vendor/ckeditor-2/adapters/jquery.js"></script>

<script>

   $(document).ready(function(){
    $('select').formSelect();
    $('textarea').ckeditor();
 });
</script>

<div class="row">
	<div class="col offset-m2 m8 card">
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			    	<p>Corrige los siguientes errores:</p>
			        <ul>
			            @foreach ($errors->all() as $message)
			                <li>{{ $message }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<h3 class="center">Editar evento</h3>
				<form action="{{ route('eventos.update',$evento->id) }}" method="POST" enctype="multipart/form-data">
					
					

					{{ csrf_field() }}
					{{ method_field('PUT') }}
				
			<div class="input-field col s12">
		            <input type="text" class="form-control" value="{{$evento->titulo}}" name="titulo"/>
		        	<label for="titulo">Titulo</label>
		       </div>
			
				
				<p class="center">Descripcion evento</p>

		       		<textarea  name="descripcion" id="" cols="30" rows="10" class="ckeditor">
		       			{{$evento->descripcion}}
		       		</textarea>
					<br><br>
				<div class="file-field col s8 offset-s2">
		            <div class="btn color-cut">
                    	<span>Foto</span>
                    	<input type="file"  name="imagen">
                  	</div>
                  	<div class="file-path-wrapper">
                    	<input class="file-path validate" type="text" value="{{$evento->imagen}}" name="imagen" required>
                  	</div>
		        </div>

				<div class="input-field col s12 offset-m2 m8">
		            <input type="text" class="datepicker" value="{{$evento->fecha}}" name="fecha" placeholder="Ingrese la Fecha del evento" required>
		       </div>


				<div>
		        <input type="submit" class="btn btn-block color-cut" value="Editar">
				</form>
				</div>


	</div>
</div>

@endsection