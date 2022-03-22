<?php

namespace App\Http\Controllers;

use App\Models\Concejo;

use Illuminate\Http\Request;

class ConcejoController extends Controller
{
    //

    public function index() {
        $concejo = Concejo::join('directivas','concejos.id_directiva','=','directivas.id')
        ->join('secretarias','concejos.id_secretarias','=','secretarias.id')
        ->select('concejos.tp_doc','concejos.num_doc','concejos.nombres','concejos.apellidos','concejos.direc','concejos.tele','concejos.email','concejos.id',
        'directivas.nombre as directiva','secretarias.nombre as secretaria')->get();
        
        return['concejo'=>$concejo];


    }

    public function store(Request $request) {
        $concejo= new Concejo();
        $concejo->tp_doc=$request->tpDoc;
        $concejo->num_doc=$request->numDoc;
        $concejo->nombres=$request->nombres;
        $concejo->apellidos=$request->apellidos;
        $concejo->direc=$request->direc;
        $concejo->tele=$request->tele;
        $concejo->email=$request->email;

        $concejo->id_directiva=$request->idDirectiva;
        $concejo->id_secretaria=$request->idSecretaria;

        $concejo->save();

    }

    public function getConcejoData(Request $request) {
        $concejo= Concejo::select('id','tp_doc','num_doc','nombres','apellidos','direc','tele','email')
        ->where('edo',1)
        ->where('id',$request->id)
        ->get();

        return['concejo'=>$concejo];
    }
}
