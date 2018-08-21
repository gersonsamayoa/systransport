<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\tipoUsuario;
use App\region;
use App\transaccion;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;


class Informescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {
        $usuariomaquinaria= tipoUsuario::find(1)->where('descripcion','usuariomaquinaria')->first();
      

        $region=Auth::user()->obtenerregion();
       
        $usuarios=User::where('user_id', Auth::user()->obtenerId())->paginate(4);

        if(Auth::user()->gerentemaquinaria()){
        $usuarios=User::Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuariomaquinaria->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->paginate(4); 
        }

       
        $pdf=new PDF();
        $pdf=PDF::loadview('admin.usuarios.informe',compact('usuarios'));
         return $pdf->stream('archivo.pdf');

    }

    public function factura($id)
    {
       
       $transacciones= transaccion::orderBy('id', 'ASC')
                                ->where('id', $id)
                                ->where('estadoTransaccion_id',2)->paginate(4);

        $region=Auth::user()->obtenerregion();
        $usuario=Auth::user();

        $pdf=new PDF();

        if(Auth::user()->gerentegeneral()){
            $transacciones= transaccion::orderBy('id', 'ASC')
                                ->where('estadoTransaccion_id',2)->paginate(4);
             $sum = transaccion::where('estadoTransaccion_id',2)->sum('total');
            $pdf=PDF::loadview('admin.transaccion.informe',compact('transacciones', 'region', 'usuario', 'sum'));
         return $pdf->stream('archivo.pdf');
        }
        else{
        $pdf=PDF::loadview('admin.transaccion.factura',compact('transacciones', 'region', 'usuario'));
         return $pdf->stream('archivo.pdf');}
    }

 
    public function create()
    {
        //
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
