<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nota;
use Illuminate\Support\Facades\DB;

class notacontroller extends Controller
{
    public function index(Request $request){
        $NotaBuscar=$request->get('buscar'); 
        $notas=DB::table('notas')
                    ->select('id','texto','fecha','contacto_id')
                    ->orwhere('texto', 'LIKE', '%'.$NotaBuscar.'%')
                    ->orwhere('fecha', 'LIKE', '%'.$NotaBuscar.'%')
                    ->orwhere('contacto_id', 'LIKE', '%'.$NotaBuscar.'%')
                    ->paginate(20);
        return view ('nota.notavista', compact('notas','NotaBuscar'));

    }

    public function create(){
        return view('nota.notacrear');
    }

    public function show($id){
        $notaC = nota::findOrfail($id);
        return view('nota.notaver', compact('notaC'));
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request){

        $request->validate([
            'texto'=>'required|alpha',
            'fechainicio'=>'required|date',
            'idusuario'=>'required|numeric' 
        ]);
    
    $Notanuevo = new nota();

    $Notanuevo->texto = $request->input('texto');
    $Notanuevo->fecha = $request->input('fechainicio');
    $Notanuevo->contacto_id = $request->input('idusuario');

    $creado = $Notanuevo->save();

    if($creado){
        return redirect()->route('nota.index')->with('mensaje', 'La Nota fue creada exitosamente.');
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
        'texto'=>'required|alpha',
        'fechainicio'=>'required|date',
        'idusuario'=>'required|numeric' 
    ]);


    $NotaEditar = nota::findOrfail($id);

    $NotaEditar->texto = $request->input('texto');
    $NotaEditar->fecha = $request->input('fechainicio');
    $NotaEditar->contacto_id = $request->input('idusuario');
    
    $creado = $NotaEditar->save();

    if($creado){
        return redirect()->route('nota.index')->with('mensaje', 'La nota fue editada exitosamente.');
    }else{
        return back();
    }

} 

public function edit($id){
    $nota = nota::findOrfail($id);
    return view('nota.notaeditar',compact('nota'));
}

public function destroy($id){
    nota::destroy($id);
    return redirect('/nota')->with('mensaje', 'Se Elimino la Nota.');
}

}
