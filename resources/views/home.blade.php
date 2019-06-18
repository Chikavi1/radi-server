@extends('layouts.app')

@section('content')
    <h1 class="center-align">Inicio</h1>
  
      <div class="row">
        <div class="col s12 m4">
           <a href="{{ route('perros.index') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/menu.png')}}">
                  <span class="card-title">Lista de perros</span>
                </div>
               </div>
            </a>
        </div>
        <div class="col s12 m4">
          <div class="card">
             <a href="{{ route('perros.create') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/mas.png')}}">
                  <span class="card-title">Crear perfil perro</span>
                </div>
               </div>
            </a>
          </div>
        </div>
        <div class="col s12 m4">
             <a href="{{ route('eventos.create') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/bloc.png')}}">
                  <span class="card-title">Agregar Eventos</span>
                </div>
               </div>
            </a>
          </div>

         <div class="col s12 m4">
          <div class="card">
             <a href="{{ route('vacunas.create') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/vacunacion.png') }}">
                  <span class="card-title">Agregar vacunas</span>
                </div>
               </div>
            </a>
          </div>
        </div>
         <div class="col s12 m4">
          <div class="card">
             <a href="{{ route('desparasitacion.create') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/desparasitacion.png') }}">
                  <span class="card-title">Desparasitaciones</span>
                </div>
               </div>
            </a>
          </div>
        </div>
         <div class="col s12 m4">
          <div class="card">
             <a href="{{ route('denuncias.index') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/queja.png') }}">
                  <span class="card-title">Checar denuncias</span>
                </div>
               </div>
            </a>
          </div>
        </div>
         <div class="col s12 m4">
          <div class="card">
            <a href="{{ route('peticiones.index') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/correo.png') }} ">
                  <span class="card-title">solicitudes de adopcion</span>
                </div>
               </div>
            </a>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <a href="{{ route('aliados.index') }}">
               <div class="card">
                <div class="card-image">
                  <img src="{{ asset('img/correo.png') }} ">
                  <span class="card-title">Aliados</span>
                </div>
               </div>
            </a>
          </div>
        </div>
        </div>
     
   </div>
@endsection
