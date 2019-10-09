@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script src="/vendor/ckeditor-2/ckeditor.js"></script>
<script src="/vendor/ckeditor-2/adapters/jquery.js"></script>

<script>

   $(document).ready(function(){
   	$('.modal').modal();
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
			<h3 class="center">Editar Perfil</h3>
				<form action="{{ route('perros.update',$perro->id) }}" method="POST" enctype="multipart/form-data">
					
					@method('PATCH')
					{{ csrf_field() }}
				
				<div class="input-field col s12">
		            <input type="text" class="form-control" name="nombre" value="{{$perro->nombre}}" required />
		        	<label for="nombre">nombre</label>
		       </div>

		        <div class="input-field col s6">
		              <label for="raza">raza</label>
		              <input type="text" class="form-control" name="raza" value="{{ $perro->raza }}" required />
		        </div>
		        <div class="input-field col s6">
		              <label for="color">color</label>
		              <input type="text" class="form-control" name="color" value="{{$perro->color}}" required />
		        </div>

		        <div class="input-field col s12 m6">
				    <select name="especie" value="{{$perro->especie}}">
				      <option value="" disabled selected>{{$perro->especie}}</option>
				      <option value="perro" >Perro</option>
				      <option value="gato" >Gato</option>
				    </select>
				  </div>
				<div class="input-field col s12 m6">
				    <select name="sexo" value="{{$perro->sexo}}">
				      <option value="" disabled >Selecciona una opcion</option>
				      <option value="macho" 
				      @if(old('sexo') == 'macho') selected @endif >Macho</option>
				      <option value="hembra" @if(old('sexo') == 'macho')selected @endif>Hembra</option>
				    </select>
				  </div>

		        <div class="file-field  input-field col s8 offset-s2">
		            <div class="btn color-cut">
                    	<span>Foto</span>
                    	<input type="file" name="imagen">
                  	</div>
                  	<div class="file-path-wrapper">
                    	<input class="file-path validate" type="text" name="imagen" >
                  	</div>
		        </div>
		      

				<div class="input-field col s8 offset-s2">
					<p class="center">Notas:</p>
		        	<textarea name="notas" id="" cols="30" rows="10" class="ckeditor" required >		        	{{$perro->notas}}
		        	</textarea>
 				</div>

				<div class="input-field col s8 offset-s2">
					<p class="center">Señas particulares:</p>
		        	<textarea name="senas" id="" cols="30" rows="10" class="ckeditor" >
		        		{{$perro->senas}}
			        </textarea>
				</div>

		      <div class="input-field col  offset-s3 s6">
				    <select name="status">
				      <option value="" disabled selected>{{$perro->status}}</option>
				      <option value="no Adoptado" >No Adoptado</option>
				      <option value="Adoptado" >Adoptado</option>
				    </select>
				  </div>
			<div>

			<div class="input-field col  m6">
				<input type="text" name="qr_code" value="{{$perro->qr_code}}">
				<label for="qr_code">qrcode</label>
			</div> 	
			<div class="input-field col m6">
				<input type="text" name="place" value="{{$perro->place}}">
				<label for="place">Lugar</label>
			</div> 	
			<div class="input-field col  m6">
				<input type="text" name="user_id" value="{{$perro->user_id}}">
				<label for="user_id">usuario id</label>
			</div> 	
			<div class="input-field col  m6">
				<input type="text" name="owner" value="{{$perro->owner}}">
				<label for="owner">Dueño</label>
			</div>
			<div class="input-field col s8 offset-s2">
					<p class="center">Historia:</p>
		        	<textarea name="history" id="" cols="30" rows="10" class="ckeditor" required >		        	{{$perro->history}}
		        	</textarea>
 			</div>

		        <input type="submit" class="btn btn-block color-cut" value="Enviar">
				</form>
            <a href="#modal1" class="red-text waves-effect waves-red btn-flat modal-trigger ">Eliminar</a>
		</div>


	</div>
</div>

	<div id="modal1" class="modal">
	    <div class="modal-content center-align">
	      <h4 class="">¿Estas seguro de eliminarlo?</h4>
	      <p>Al eliminarlo no habrá marcha atrás</p>
	    </div>
	    <div class="modal-footer">
			<form method="POST" action="{{ route('perros.destroy',$perro->id) }}">
	      		<a href="#!" class="modal-close waves-effect waves-green blue-text btn-flat">Cancelar</a>
	      		@csrf
	      		@method('DELETE')
	      	<button class="red-text waves-effect waves-red btn-flat modal-trigger" type="submit">Eliminar</button>
	      </form>
	    </div>
	</div>

@endsection