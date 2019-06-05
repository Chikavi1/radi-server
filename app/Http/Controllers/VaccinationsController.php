<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\Dog;
use Radi\Vaccination;

class VaccinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perros = Dog::all();
        return view('vacunas.create')->with(compact('perros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function busqueda(Request $request)
    {
         $nombre = $request->nombre;
        $caca = Dog::where("nombre","=",$nombre)->get();
        if(sizeof($caca) == 0){
           return response()->json(['success'=> 'no se encontro el perro']);  
        }else{
            return response()->json(['success'=> 'se encontro el perro',"perro" => $caca]);  
        }
    }

    public function store(Request $request)
    {
       $ini =  date("y/m/d",strtotime($request->created_at));
          $vacuna = new Vaccination([
            "id_dog" => $request->id_dog,
            "nombre" => $request->nombre,
            "fecha" => $ini,
          ]
        );

          $vacuna->save();
        return view('home');
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
        //
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
        //
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
