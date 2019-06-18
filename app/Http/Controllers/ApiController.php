<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\Event;
use Radi\Resquest;
use Radi\Complaint;
use Radi\Dog;
use Radi\Vaccination;
use Radi\Deworming;
use Radi\ally;

class ApiController extends Controller
{
    public function __construct()
    {
        $eventos = Event::all();
        foreach($eventos as $evento){
            if ($evento->fecha < now()->toDateString()){
                 $eventoEditado = Event::findOrFail($evento->id);
                 $eventoEditado->status = 'Inactivo';
                 $eventoEditado->save();
            }
        }
    }
    public function showEvents(){
        return Event::where("status","Activo")->get();
    }
    public function showEventsFinished(){
        return Event::where("status","Inactivo")->limit(5)->get();
    }
    public function showAllies(){
        return ally::inRandomOrder()->get();
    }
    public function createRequest(Request $request) {
        Resquest::create($request->all());
        return 'se creo satisfactoriamente';
    }
    public function createComplaint(Request $request){
        Complaint::create($request->all());
        return 'se creo satisfactoriamente';        
    }
    public function searchWithQrCode(Request $request ){
        $dog = Dog::searchQrCode($request->qrcode);
        return ($dog == "[]") ? 'no esta registrado en la base de datos' : $dog; 
    }
    public function getVaccinations(Request $request){
        $vaccinatios = Vaccination::getVaccinations($request->id);
        return $vaccinatios;
    }
    public function getDewormings(Request $request){
        $deworming = Deworming::getDewormings($request->id);
        return $deworming;
    }
}
