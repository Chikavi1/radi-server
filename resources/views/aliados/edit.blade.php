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
			<h3 class="center">Editar Aliado</h3>
				<form action="{{ route('aliados.update',$aliado->id) }}" method="POST" enctype="multipart/form-data">
					
					

					{{ csrf_field() }}
					{{ method_field('PUT') }}
				
				<div class="input-field col s12">
		            <input type="text" class="form-control" value="{{ $aliado->nombre }}"  name="nombre" required />
		        	<label for="nombre">nombre</label>
		       </div>

		        <div class="input-field col s12">
		              <label for="personal">personal</label>
		              <input type="text" class="form-control" value="{{ $aliado->personal }}"  name="personal"  />
		        </div>
		        <div class="input-field col s6">
		              <label for="telefono">telefono</label>
		              <input type="text" class="form-control" value="{{ $aliado->telefono }}"  name="telefono"  />
		        </div>
		        <div class="input-field col s6">
		              <label for="horario">horario</label>
		              <input type="text" class="form-control" value="{{ $aliado->horario }}"  name="horario"  />
		        </div>

		        <div class="input-field col s12">
		              <label for="direccion">direccion</label>
		              <input type="text" class="form-control" value="{{ $aliado->direccion }}"  name="direccion" required />
		        </div>

		        <div class="file-field  input-field col s8 offset-s2">
		            <div class="btn color-cut">
                    	<span>Foto</span>
                    	<input type="file"  name="imagen">
                  	</div>
                  	<div class="file-path-wrapper">
                    	<input class="file-path validate" type="text" value="{{ $aliado->imagen }}"  name="imagen" required>
                  	</div>
		        </div>
		      

				<div class="input-field col s8 offset-s2">
					<p class="center">Redes Sociales:</p>
		        	<textarea   name="redes" id="" cols="30" rows="10" class="ckeditor"  >		
		        	{{ $aliado->redes }}        	
		        	</textarea>
 				</div>

				<div class="input-field col s8 offset-s2">
					<p class="center">Promociones:</p>
		        	<textarea   name="promociones" id="" cols="30" rows="10" class="ckeditor" >
		        		{{ $aliado->promociones }}
			        </textarea>
				</div>

				<div>
		        <input type="submit" class="btn btn-block color-cut" value="Editar">
				</form>
				</div>


	</div>
</div>

@endsection