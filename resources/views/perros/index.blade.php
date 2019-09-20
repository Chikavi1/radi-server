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
  <div class="row" >
	@foreach($perros as $perro)
    <div class="col m4" >
      <div class="card">
        <div class="card-image">
          <img src="/{{$perro->imagen}}" height="300">


          <span class="card-title"><a class="white-text" style="font-weight: bold;" href="{{ route('perros.show',$perro->id) }}">{{$perro->nombre}}</a></span>
        </div>
        
      </div>
    </div>
	@endforeach

  </div>
<div class="render"> 
  {!! $perros->render() !!}
</div>
  <footer >
    </footer>
            
@endsection