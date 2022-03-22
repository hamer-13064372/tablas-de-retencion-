<?php

namespace App\Http\Controllers;

use App\Models\Directiva;

use Illuminate\Http\Request;

class DirectivaController extends Controller
{
    //

    public function index() {
        $directiva= Directiva::all();
        return ['directiva'=>$directiva];
    }

    public function store(Request $request) {
        $directiva= new Directiva();
        $directiva->presidente=$request->presidente;
        $directiva->prim_vice=$request->primVice;
        $directiva->segu_vice=$request->SeguVice;
        $directiva->secretario=$request->secretario;

        $directiva->save();

    }

    public function update(Request $request) {
        $directiva= Directiva::findOrFail($request->id);
        $directiva->presidente=$request->presidente;
        $directiva->prim_vice=$request->primVice;
        $directiva->segu_vice=$request->SeguVice;
        $directiva->secretario=$request->secretario;

        $directiva->save();

    }

    public function destroy(Request $request) {
        $directiva= Directiva::findOrFail($request->id);

        $directiva->delete();
    }

    public function getDirectiva(Request $request) {
        $directiva= Directiva::select('id','directiva')
        ->where('edo',1)->get();
         return ['directiva'=>$directiva];
        
    }
}
