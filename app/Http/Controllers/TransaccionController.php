<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\transaccion;
use App\tipoTransaccion;
use App\estadoEquipo;
use App\tipoMaquinaria;
use App\maquinaria;
use Auth;

class TransaccionController extends Controller
{

    public function index()
    {
        if(!(Auth::user()->user_id))
        {
        flash('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Lo sentimos :-( aun no puedes realizar ninguna transacción, espera un poco mas...')->error()->important();
        return view('index');
        }

        $transacciones= transaccion::orderBy('id', 'ASC')
                                    ->paginate(4);
        

        return view('admin.transaccion.index', compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipoTransacciones=tipoTransaccion::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

         $usuario=Auth::user();
        $maquinarias= maquinaria::orderBy('id', 'ASC')
                                    ->where('region_id',$usuario->region_id)->get();
       

        return view('admin.transaccion.listmaquinarias', compact('tipoTransacciones', 'maquinarias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $usuario=Auth::user()->obtenerId();
        $estadoEquipo=estadoEquipo::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $tipoMaquinaria=tipoMaquinaria::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');

        $maquinaria= maquinaria::find($id);
        return view('admin.maquinaria.edit', compact('maquinaria','usuario', 'estadoEquipo', 'tipoMaquinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
