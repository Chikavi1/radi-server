@extends('layouts.app')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="/vendor/ckeditor-2/ckeditor.js"></script>
<script src="/vendor/ckeditor-2/adapters/jquery.js"></script>

@section('content')

<script>
   $(document).ready(function(){
    $('.datepicker').datepicker();
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
	<div class="center ">
		<h1 class="">Crear evento</h1>
		<a class="" href="{{ route('eventos.index')}}">ver eventos</a>
	</div>
		<form action="{{ route('eventos.store')}}" method="POST"  enctype="multipart/form-data">
					{{ csrf_field() }}
				
				<div class="input-field col s12">
		            <input type="text" class="form-control" name="titulo"/>
		        	<label for="titulo">Titulo</label>
		       </div>
			
				
				<p class="center">Descripcion evento</p>

		       		<textarea name="descripcion" id="" cols="30" rows="10" class="ckeditor"></textarea>
					<br><br>
				<div class="file-field col s8 offset-s2">
		            <div class="btn color-cut">
                    	<span>Foto</span>
                    	<input type="file" name="imagen">
                  	</div>
                  	<div class="file-path-wrapper">
                    	<input class="file-path validate" type="text" name="imagen" required>
                  	</div>
		        </div>

				<div class="input-field col s12 offset-m2 m8">
		            <input type="text" class="datepicker" name="created_at" placeholder="Ingrese la Fecha del evento" required>
		       </div>

		       <input type="submit" value="Enviar" class="btn btn-block color-cut">
		</form>
	</div>
</div>
@endsection