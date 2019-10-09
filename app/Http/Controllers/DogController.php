<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\Dog;
use Image;
use Illuminate\Support\Facades\Storage;

use Radi\Http\Requests\CreateDogRequest;



class DogController extends Controller
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
        $perros = Dog::paginate(6);
        return view('perros.index')->with(compact('perros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public  function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }

    public function pdf($qrcode)
    {
        $qrcode = $qrcode;
        $pdf = \PDF::loadView('pdf.qrcode',compact('qrcode'));
        return $pdf->download('CodigoQR.pdf');
    }

    public function store(CreateDogRequest $request)
    {   
        if($request->hasFile('imagen')){

            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }
        
      

        $qr_code = $this->generateRandomString();
       $perro = new Dog([
            'nombre' => $request->nombre ,
            'especie' => $request->especie ,
            'raza' => $request->raza ,
            'color' => $request->color ,
            'imagen' => $resultado,
            'sexo' => $request->sexo ,
            'senas' => $request->senas ,
            'notas' => $request->notas ,
            'status' => $request->status ,
            'qr_code' => 'RD10'.$qr_code ,
            'place' => $request->place,
            'user_id' => $request->user_id,
            'owner' => $request->owner,
            'history' => $request->history
        ]);
        $perro->save();

        return redirect('/perros');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perro = Dog::find($id);
        return view('perros.show')->with(compact('perro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perro = Dog::findOrFail($id);
        return view('perros.edit')->with(compact('perro'));
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
        $perro = Dog::findOrFail($id);
        $resultado = $perro->imagen;
        $sexo = $perro->sexo;
        $especie = $perro->especie;
        $status = $perro->status;

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen')->store('public');
            $resultado = str_replace("public", "storage", $imagen);
        }
        if($request->sexo){
            $sexo = $request->sexo;
        }
        if($request->especie){
            $especie = $request->especie;
        }
        if($request->status){
            $status = $request->status;
        }
        $perro->nombre = $request->get('nombre');
        $perro->especie = $especie;
        $perro->raza = $request->get('raza');
        $perro->color = $request->get('color');
        $perro->imagen = $resultado;
        $perro->sexo = $sexo;
        $perro->senas = $request->get('senas');
        $perro->notas = $request->get('notas');
        $perro->status = $status;
        $perro->qr_code = $request->get('qr_code');
        $perro->place = $request->get('place');
        $perro->user_id = $request->get('user_id');
        $perro->owner = $request->get('owner');
        $perro->history = $request->get('history');

        $perro->save();
        return redirect()->route('perros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dog = Dog::findOrFail($id);
        unlink('storage/'.$dog->imagen);
        $dog->delete();

        return redirect()->route('perros.index');

    }
}
