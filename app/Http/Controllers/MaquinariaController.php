<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\region;
use App\estadoEquipo;
use App\tipoMaquinaria;
use App\maquinaria;
use App\Http\Requests\MaquinariaRequest;
use Auth;
use Laracasts\Flash\Flash;

class MaquinariaController extends Controller
{

    public function index()
    {
        $usuario=Auth::user();
        $maquinarias= maquinaria::orderBy('id', 'ASC')
                                    ->where('region_id',$usuario->region_id)
                                    ->whereIn('estadoEquipo_id', [1,4])
                                    ->paginate(4);
                
        return view('admin.maquinaria.index', compact('maquinarias'));
    }

    public function create()
    {
        $usuario=Auth::user();
        $estadoEquipo=estadoEquipo::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $tipoMaquinaria=tipoMaquinaria::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

        return view('admin.maquinaria.create', compact('usuario', 'estadoEquipo', 'tipoMaquinaria'));
    }


    public function store(MaquinariaRequest $request)
    {
        $name="";
        if($request->file('imagen')){
        $file= $request->file('imagen');
        $name='systransport_'.time().'.'.$file->getClientOriginalExtension();
        $path=public_path(). '/images/';
        $file->move($path, $name);
        }


        $maquinaria=new maquinaria($request->all());
        $maquinaria->imagen=$name;
        $maquinaria->save();
        flash("Se ha registrado el equipo ". $maquinaria->placa . " de forma exitosa")->success()->important();
        return redirect()->route('admin.maquinaria.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $usuario=Auth::user()->obtenerId();
        $estadoEquipo=estadoEquipo::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $tipoMaquinaria=tipoMaquinaria::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

        $maquinaria= maquinaria::find($id);
        return view('admin.maquinaria.edit', compact('maquinaria','usuario', 'estadoEquipo', 'tipoMaquinaria'));
    }


    public function update(Request $request, $id)
    {

        $maquinaria=maquinaria::Find($id);
        $name=$maquinaria->imagen;

        if($request->file('imagen')){
        $file= $request->file('imagen');
        $name='systransport_'.time().'.'.$file->getClientOriginalExtension();
        $path=public_path(). '/images/';
        $file->move($path, $name);
        }
      
        $maquinaria->Fill($request->all());
        $maquinaria->imagen=$name;
        $maquinaria->save();

      flash('El Equipo '. $maquinaria->placa . ' ha sido editado con éxito')->warning()->important();
      return redirect()->route('admin.maquinaria.index');
    }

    
    public function destroy($id)
    {
        $maquinaria= maquinaria::find($id);
        /*Otenemos el path para eliminar la imagen del servidor*/
        $name=$maquinaria->imagen;
        $path=public_path(). '/images/'.$name;
        unlink($path);

        $maquinaria->delete();

        flash('El Equipo ' . $maquinaria->placa . ' a sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.maquinaria.index');
    }
}
