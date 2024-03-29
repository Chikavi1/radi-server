<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\Event;
use Radi\Http\Requests\CreateEventRequest;
use Carbon\Carbon; 
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $eventos = Event::all();
            # code...
        foreach($eventos as $evento){
                 $eventoEditado = Event::findOrFail($evento->id);
            if ($evento->fecha < now()->toDateString()){
                 $eventoEditado->status = 'Inactivo';
                 $eventoEditado->save();
            }else{
                 $eventoEditado->status = 'Activo';
                 $eventoEditado->save();
            }
        }
    }


    public function index()
    {
        $eventos = Event::paginate(6);
        return view('eventos.index')->with(compact('eventos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $ini =  date("y/m/d",strtotime($request->fecha));
        if($request->hasFile('imagen')){

            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }

        $event = new Event([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $resultado,
            'fecha' => $ini
        ]);
        $event->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Event::findOrFail($id);
        return view('eventos.edit')->with(compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Event::findOrFail($id);
         if($request->hasFile('imagen')){
            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }else{
        $resultado = $evento->imagen;
        }
        $evento->titulo = $request->titulo;
        $evento->imagen = $resultado;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;

        $evento->save();
        return redirect('/eventos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
