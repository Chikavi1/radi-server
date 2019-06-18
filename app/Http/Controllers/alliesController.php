<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\ally;
class alliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $aliados = ally::all(); 
    return view('aliados.index')->with(compact('aliados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aliados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagen')){

            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }

        $aliado = new ally([
            'nombre' => $request->nombre,
            'personal' => $request->personal,
            'imagen' => $resultado,
            'horario' => $request->horario,
            'direccion' => $request->direccion,
            'redes' => $request->redes,
            'telefono' => $request->telefono,
            'promociones' => $request->promociones
        ]);

        $aliado->save();
        return redirect('/aliados');
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
        $aliado = ally::findOrFail($id);
        return view('aliados.edit')->with(compact('aliado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     $item = Items::findOrFail($id)->update($request->all());
     */
    public function update(Request $request, $id)
    {
        $aliado = ally::findOrFail($id);
         if($request->hasFile('imagen')){
            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }else{
        $resultado = $aliado->imagen;
        }
        $aliado->nombre = $request->nombre;
        $aliado->personal = $request->personal;
        $aliado->imagen = $resultado;
        $aliado->horario = $request->horario;
        $aliado->direccion = $request->direccion;
        $aliado->redes = $request->redes;
        $aliado->telefono = $request->telefono;
        $aliado->promociones = $request->promociones;

        $aliado->save();
       return redirect('/aliados');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aliado = ally::findOrFail($id);
        $aliado->delete();
        return redirect('/aliados');

    }
}
