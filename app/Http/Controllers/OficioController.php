<?php

namespace App\Http\Controllers;

use App\Models\Oficio;

use Illuminate\Http\Request;

class OficioController extends Controller
{
    //
    public function index() {
      $oficio= Oficio::all();
      return ['oficio'=>$oficio];

    }
    
    public function store(Request $request) {
      $oficio = new Oficio ();
      $oficio->ofi_envi=$request->ofiEnvi;
      $oficio->ofi_resi=$request->ofiResi;
      $oficio->fecha=$request->fecha;
      $oficio->edo=$request->edo;
    
      $oficio->save();

    }
    
    public function update(Request $request) {
      $oficio= Oficio::findOrFail($request->id);

      $oficio->ofi_envi=$request->ofiEnvi;
      $oficio->ofi_resi=$request->ofiResi;
      $oficio->fecha=$request->fecha;
      $oficio->edo=$request->edo;
    
      $oficio->save();

    }

    public function destroy(Request $request) {
      $oficio= Oficio::findOrFail($request->id);

      $oficio->delete();
    }

    public function getOficio(Request $request) {
      $oficio= Oficio::select('id','oficio')
      ->where('edo',1)->get();

      return ['oficio'=>$oficio];
    }
}
