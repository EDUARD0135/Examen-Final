<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\evento;
use Illuminate\Support\Facades\DB;

class eventocontroller extends Controller
{
    public function index(Request $request){
        $EventoBuscar=$request->get('buscar'); 
        $eventos=DB::table('eventos')
                    ->select('id','titulo','descripción','fecha_inicio','fecha_fin','contacto_id')
                    ->orwhere('titulo', 'LIKE', '%'.$EventoBuscar.'%')
                    ->orwhere('descripción', 'LIKE', '%'.$EventoBuscar.'%')
                    ->orwhere('fecha_inicio', 'LIKE', '%'.$EventoBuscar.'%')
                    ->orwhere('fecha_fin', 'LIKE', '%'.$EventoBuscar.'%')
                    ->orwhere('contacto_id', 'LIKE', '%'.$EventoBuscar.'%')
                    ->paginate(10);
        return view ('evento.eventovista', compact('eventos','EventoBuscar'));

    }

    public function create(){
        return view('evento.eventocrear');
    }

    public function show($id){
        $eventoC = evento::findOrfail($id);
        return view('evento.eventover', compact('eventoC'));
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([
            'titulo'=>'required',
            'descripcion'=>'required',
            'fechainicio'=>'required|date',
            'fechafin'=>'required|date',
            'contactoid'=>'required|numeric'
        ]);
    
    $Eventonuevo = new evento();

    $Eventonuevo->titulo = $request->input('titulo');
    $Eventonuevo->descripción = $request->input('descripcion');
    $Eventonuevo->fecha_inicio = $request->input('fechainicio');
    $Eventonuevo->fecha_fin = $request->input('fechafin');
    $Eventonuevo->contacto_id = $request->input('contactoid');


    $creadoE = $Eventonuevo->save();

    if($creadoE){
        return redirect()->route('evento.index')->with('mensaje', 'El evento fue creado exitosamente.');
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
        'titulo'=>'required',
        'descripcion'=>'required',
        'fechainicio'=>'required|date',
        'fechafin'=>'required|date',
        'contactoid'=>'required|numeric'
    ]);


    $EventoEditar = evento::findOrfail($id);

    $EventoEditar->titulo = $request->input('titulo');
    $EventoEditar->descripción = $request->input('descripcion');
    $EventoEditar->fecha_inicio = $request->input('fechainicio');
    $EventoEditar->fecha_fin = $request->input('fechafin');
    $EventoEditar->contacto_id = $request->input('contactoid');
    
    $creado = $EventoEditar->save();

    if($creado){
        return redirect()->route('evento.index')->with('mensaje', 'El evento fue editado exitosamente.');
    }else{
        return back();
    } 

} 

public function edit($id){ 
    $evento = evento::findOrfail($id);
    return view('evento.eventoeditar',compact('evento'));
}

public function destroy($id){
    evento::destroy($id);
    return redirect('/evento')->with('mensaje', 'Se Elimino el Evento.');
}

}