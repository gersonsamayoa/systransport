<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $usuario=Auth::user()->obtenerId();
        $maquinarias= maquinaria::orderBy('id', 'ASC')
                                    ->where('user_id', $usuario)
                                    ->paginate(4);
        return view('admin.maquinaria.index', compact('maquinarias'));
    }

    public function create()
    {
        $usuario=Auth::user()->obtenerId();
        $estadoEquipo=estadoEquipo::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $tipoMaquinaria=tipoMaquinaria::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

        return view('admin.maquinaria.create', compact('usuario', 'estadoEquipo', 'tipoMaquinaria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinariaRequest $request)
    {
        $maquinaria=new maquinaria($request->all());
        $maquinaria->save();
        flash("Se ha registrado el equipo ". $maquinaria->placa . " de forma exitosa")->success()->important();
        return redirect()->route('admin.maquinaria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Auth::user()->obtenerId();
        $estadoEquipo=estadoEquipo::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $tipoMaquinaria=tipoMaquinaria::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

        $maquinaria= maquinaria::find($id);
        return view('admin.maquinaria.edit', compact('maquinaria','usuario', 'estadoEquipo', 'tipoMaquinaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $maquinaria=maquinaria::Find($id);
        $maquinaria->Fill($request->all());
        $maquinaria->save();

      flash('El Equipo '. $maquinaria->placa . ' ha sido editado con éxito')->warning()->important();
      return redirect()->route('admin.maquinaria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maquinaria= maquinaria::find($id);
        $maquinaria->delete();

        flash('El Equipo ' . $maquinaria->placa . ' a sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.maquinaria.index');
    }
}
