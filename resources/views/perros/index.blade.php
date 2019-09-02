@extends('layouts.app')
@section('content')
	<style>
   footer {
  position: absolute;
  bottom: -100px;
  color: white;
} 
.render{
  margin-top: 3em;
}
  </style>
  <div class="row">
	@foreach($perros as $perro)
    <div class="col m4">
  	  <a href="{{ route('perros.show',$perro->id) }}">
        <div class="card">
          <div class="card-image">
            <img src="/{{$perro->imagen}}">
            <span class="card-title">{{$perro->nombre}}</span>
          </div>
        </div>
  	  </a>
    </div>
	@endforeach

  </div>
<div class="render"> 
  {!! $perros->render() !!}
</div>
  <footer >
    </footer>
            
@endsection