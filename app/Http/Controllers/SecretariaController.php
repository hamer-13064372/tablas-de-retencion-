<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

use Inertia\Inertia;

class SecretariaController extends Controller
{
    //
    public function index() {
        $secre= Secretaria::all();
        return Inertia::render('Secre',['secre'=>$secre]);
    }

    public function indexData() {
        $secre= Secretaria::all();
        return ['secre'=>$secre];
    }

    public function store(Request $request) {
       $secre = new Secretaria();
       $secre->atributos=$request->atri;
       $secre->edo=$request->edo;

       $secre->save();
    }

    public function update(Request $request) {
        $secre = Secretaria::findOrFail($request->id);
        $secre->atributos=$request->atri;
        $secre->edo=$request->edo;

        $secre->save();
    }

    public function destroy(Request $request) {
       $secre = Secretaria::findOrFail($request->id);

       $secre->delete();
    }

    public function getSecre(Request $request) {
        $secre= Secretaria::select('id','secretaria')
        ->where('edo',1)->get();

        return ['secre'=>$secre];
    }
}
