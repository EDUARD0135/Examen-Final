<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;
use Illuminate\Support\Facades\DB; 

class contactocontroller extends Controller
{

    public function index(Request $request){
        $ContactoBuscar=$request->get('buscar');
        $contactos=DB::table('contactos')
                    ->select('id','nombre','apellido', 'correo_electronico', 'telefono')
                    ->where('nombre', 'LIKE', '%'.$ContactoBuscar.'%')
                    ->orwhere('apellido', 'LIKE', '%'.$ContactoBuscar.'%')
                    ->orwhere('correo_electronico', 'LIKE', '%'.$ContactoBuscar.'%')
                    ->orwhere('telefono', 'LIKE', '%'.$ContactoBuscar.'%')
                    ->paginate(10);
        return view ('contacto.contactovista', compact('contactos','ContactoBuscar'));

        $contactos =contacto::paginate(20);
        return view('contacto.contactovista', compact('contactos'));

    }
    
    public function create(){
        return view('contacto.contactocrear'); 
    }

    public function show($id){
        $contactoC = contacto::findOrfail($id);
        return view('contacto.contactover', compact('contactoC'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([
            'nombre'=>'required|alpha',
            'apellido'=>'required|alpha',
            'correo'=>'required|alpha',
            'telefono'=>'required|numeric'
        ]);
    
    
    $Contactonuevo = new contacto();

    $Contactonuevo->nombre =  $request->input('nombre');
    $Contactonuevo->apellido = $request->input('apellido');
    $Contactonuevo->correo_electronico = $request->input('correo');
    $Contactonuevo->telefono = $request->input('telefono');

    $creado = $Contactonuevo->save();

    if($creado){
        return redirect()->route('contacto.index')->with('mensaje', 'El estudiante fue creado exitosamente.');
    }else{
        return back();
    }
}


public function update(Request $request, $id){

   /* $request->validate([
        'nombre'=>'required|alpha',
        'apellido'=>'required|alpha',
        'nota'=>'required|numeric|min:0|max:100',
        'identidad'=>'required',
        'cuenta'=>'required|numeric'

    ]);*/

    $request->validate([
        'nombre'=>'required|alpha',
        'apellido'=>'required|alpha',
        'correo'=>'required|email',
        'telefono'=>'required|numeric'
          
    ]);


    $ContactoEditar = contacto::findOrfail($id);

    $ContactoEditar->nombre =  $request->input('nombre');
    $ContactoEditar->apellido = $request->input('apellido');
    $ContactoEditar->correo_electronico = $request->input('correo');
    $ContactoEditar->telefono = $request->input('telefono');
    
    $creado = $ContactoEditar->save();

    if($creado){
        return redirect()->route('contacto.index')->with('mensaje', 'El estudiante fue editado exitosamente.');
    }else{
        return back();
    }

} 

public function edit($id){
    $contacto = contacto::findOrfail($id);
    return view('contacto.contactoeditar',compact('contacto'));
}

public function destroy($id){
    contacto::destroy($id);
    return redirect('/contacto')->with('mensaje', 'Se Elimino el Contacto.');
}

}
