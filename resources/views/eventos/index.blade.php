@extends('layouts.app')

@section('content')
<div class="row">
	
	@foreach($eventos as $evento)
    <div class="col m4 s12">
      	<div class="card">
    		<div class="card-image waves-effect waves-block waves-light">
	      		<img class="activator" src="/{{ $evento->imagen }}">
	   		</div>
	   		 <div class="card-content">
	      		<span class="card-title activator grey-text text-darken-4">{{$evento->titulo}}<i class="material-icons right">more_vert</i></span>
	   		 </div>
	    	<div class="card-reveal">
	      		<span class="card-title grey-text text-darken-4">{{$evento->titulo}}<i class="material-icons right">close</i></span>
	      		<p>{!! $evento->descripcion !!}</p>
	      		<a href="{{ route('eventos.edit',$evento->id) }}">Editar</a>
	    	</div>
	  	</div>
    </div>
	@endforeach
</div>


  <footer >
        {!! $eventos->render() !!}
    </footer>
@endsection