@extends('layouts.app')


@section('content')
<style>
.covers{
	background: #17202f;
	height: 14em;
	}
	.dimg{
		margin-top: -14em !important;
	}
	.justify{
		text-align: justify;
	}
</style>
	<div class="row">
	
		<div class="col m8 offset-m2 s12">
			<div class="card covers">
				
			</div>
			<div class="card center">
				<img class="circle dimg" src="/{{ $perro->imagen}}" alt="" width="300" height="300">
				<h1>{{ $perro->nombre }}</h1>
				<div class="row">
					<div class="col s6 m6">
						<h5>Especie:</h5>
						<p>{{$perro->especie}}</p> 
					</div>
					<div class="col s6 m6">
						<h5>Raza:</h5>
						<p>{{$perro->raza}}</p> 
					</div>
				</div>
				<div class="row">
					<div class="col s6 m6">
						<h5>Color:</h5>
						<p>{{$perro->color}}</p> 
					</div>
					<div class="col s6 m6">
						<h5>Sexo:</h5>
						<p>{{$perro->sexo}}</p> 
					</div>
				</div>
			</div>
			<div class="card p5 center">
				<h3 class="center">Codigo QR</h3>
				<div class="row">
					<div class="col m6 ">
						{!!  DNS2D::getBarcodeHTML($perro->qr_code, "QRCODE"); !!}
					</div>
					<div class="col m6">
						<a href="{{ route('pdf' , $perro->qr_code ) }}" class="btn color-cut">Imprimir</a>
						<h4>Numero de codigo:</h4>
						{{$perro->qr_code}}
					</div>
				</div>	
			</div>
			<div class="card p5" >
				<h3 class="center">Señas Particulares</h3>
				<p class="justify">{!! $perro->senas !!}</p>
			</div>
			<div class="card p5" >
				<h3 class="center">Notas</h3>
				<p class="justify">{!! $perro->notas !!}</p>
			</div>
			<div>
				<div class="row">
					<div class="col m3 offset-m2">
						<h5>Estado</h5>
						<p>{{ $perro->status }}</p>
					</div>
					<div class="col m2 offset-m2">
						<h5>Lugar</h5>
						<p>{{$perro->place}}</p>
					</div>
				</div>
				<div class="center">
					
				@if($perro->status == "Adoptado")
				<h5>Dueño</h5>
				<p>{{$perro->owner}}</p>
				@endif
				</div>		
				<div>
					<h4 class="center">Historia</h4>
					<div class="container">
						<p style="text-align: justify;">{!! $perro->history !!}</p>
					</div>
				</div>
			</div>
	<a href="{{ route('perros.edit' ,$perro->id) }}" class="btn btn-block color-cut">Editar</a>
		</div>
	</div>
@endsection