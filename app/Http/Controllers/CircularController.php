<?php

namespace App\Http\Controllers;



use App\Models\Circular;
use Illuminate\Http\Request;



use Inertia\Inertia;

class CircularController extends Controller
{
    //

    public function indexMain() {
        $circular= Circular::all();
        return Inertia::render('Circular',['circular'=>$circular]);
    }


    public function index() {
        $circular= Circular::join('oficios','circulars.id_oficio','=','oficios_id')
        ->select('circulars.informativa','circulars.normativa','circulars.fecha','circulars.id',
       'oficios.nombre as oficio')->get();
   
       return ['circular'=>$circular];
       }
   
       public function store(Request $request) {
           $circular= new Circular();
           $circular->informativa=$request->informativa;
           $circular->normativa=$request->normativa;
           $circular->fecha=$request->fecha;
           $circular->edo=$request->edo;

           $circular->id_oficio=$request->idOficio;

           $circular->save();
   
       }
   
       public function getCircularData(Request $request) {
           $circular= Circular::select('id','informativa','normativa','fecha','edo')
           ->where('edo',1)
           ->where('id',$request->id)
           ->get();
   
           return ['circular'=>$circular];
       }
   
}
