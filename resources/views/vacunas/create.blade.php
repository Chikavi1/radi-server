@extends('layouts.app')

    <script src="{{ asset('js/materialize.min.js') }}"></script>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous"></script>

<script>

	$(document).ready(function(){
    $('.datepicker').datepicker();
    $('input.autocomplete').autocomplete({
      data: {
      	@foreach($perros as $perro)
        "{{ $perro->nombre }}": null,
        @endforeach
      },
    });
  });
   
</script>
@section('content')
	<h1 class="center-align">vacunas</h1>
			 <div class="row">
			    <div class="col s12 offset-m2 m8">
			    	<div class="card">
		
		<form id="myform" autocomplete="false" >
			    		<div class="row valign-wrapper">
			    			<div class="col m8">
			    				<div class="input-field col s12">
						          <i class="material-icons prefix">search</i>
						          <input type="text" id="autocomplete-input" name="nombre" class="autocomplete" autocomplete="off">
						          <label for="autocomplete-input">Buscar Amigo</label>
						        </div>
			    			</div>
			    			<div class="col m3">
						      <input type="submit" id="ajaxsubmit" class="btn color-cut" value="Buscar">
			    			</div>
			    		</div>
			        

					<div class="center">
						
		 				<div class="alert center-align " style="display:none"></div><br>
		 				<img id="imagen-response" class="circle center" style="display: none" src="" alt="" width="200" height="200">

		 				<div id="resultado" style="display: none">
		 						<div class="col m3 s12" style="display: none"  id="response-raza"></div>
		 						<div class="col m3 s12" style="display: none" id="response-color"></div>
		 						<div class="col m3 s12"  style="display: none" id="response-sexo"></div>
		 						<div class="col m3 s12"style="display: none" id="response-especie"></div>
		 				</div>

		</form>
					

		<form id="fomulario" action="{{ route('vacunas.store') }}" method="POST" style="display: none;" >
			{{ @csrf_field() }}
			
			<input type="hidden" name="id_dog" id="id_dog">

			 <div class="input-field col s12 offset-m2 m8">
	          	<input  id="nombre" name="nombre" type="text" class="validate" autocomplete="off">
	          	<label for="nombre">Nombre</label>
	        </div>

 			<div class="input-field col s12 offset-m2 m8">
		            <input type="text" class="datepicker" name="created_at" autocomplete="off" placeholder="Ingrese Fecha" required>
		       </div>

	        <input type="submit" class="btn btn-block color-cut" value="Enviar">
	
		</form>
	

	</div>
			    </div>
			   	</div>

	<script>
		$(document).ready(function(){
			$("#ajaxsubmit").click(function(e){

				$("#imagen-response").hide();
				$("#response-raza,#response-color,#response-sexo,#response-especie").hide();
				$("#fomulario").hide();
				e.preventDefault();
				$.ajax({
					  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					    type: 'post',
					    dataType: 'json',
					    url: '{{ url("vacunas/post") }}',
					    data: {
					        '_token': $('input[name=_token]').val(),
					        'nombre': $('#autocomplete-input').val()
					    },
					    success: function(response) {
					      	 $('.alert').show();
                     		 $('.alert').html(response.success);

                     		 if(response.success === "se encontro el perro"){
                     		 	$("#resultado").show();
                     		 	$("#fomulario").show();
								$("#response-raza,#response-color,#response-sexo,#response-especie").show();
	                     		$('#response-raza').append("<h4>Raza</h4>"+response.perro[0].raza);
	                     		$('#response-color').append("<h4>Color</h4>"+response.perro[0].color);
	                     		$('#response-sexo').append("<h4>Sexo</h4>"+response.perro[0].sexo);
	                     		$('#response-especie').append("<h4>Especie</h4>"+response.perro[0].especie);


					              document.getElementById("id_dog").value = response.perro[0].id;
					              console.log(document.getElementById("id_dog").value)


	                     		$("#imagen-response").show();
	                     		$imagen = $("#imagen-response");
	                     		$imagen[0].setAttribute("src","http://127.0.0.1:8000/" + response.perro[0].imagen)
                     		 }
					    }
					});
								$('#response-raza').empty();
	                     		$('#response-color').empty();
	                     		$('#response-sexo').empty();
	                     		$('#response-especie').empty();
			});
		});
	</script>


@endsection