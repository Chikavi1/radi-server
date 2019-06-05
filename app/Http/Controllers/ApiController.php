<?php

namespace Radi\Http\Controllers;

use Illuminate\Http\Request;
use Radi\Event;
use Radi\Resquest;
use Radi\Complaint;
use Radi\Dog;
use Radi\Vaccination;
use Radi\Deworming;

class ApiController extends Controller
{
    public function showEvents(){
        return Event::all();
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
