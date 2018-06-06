<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\tipoUsuario;
use App\region;
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
        $usuariomineria= tipoUsuario::find(1)->where('descripcion','usuariomineria')->first();
        $usuarioproductos= tipoUsuario::find(1)->where('descripcion','usuarioproductos')->first();
        $usuarioservicios= tipoUsuario::find(1)->where('descripcion','usuarioservicios')->first();

        $region=Auth::user()->obtenerregion();
       
        $usuarios=User::where('user_id', Auth::user()->obtenerId())->paginate(4);

        if(Auth::user()->gerentemaquinaria()){
        $usuarios=User::Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuariomaquinaria->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuariomaquinaria->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

        if(Auth::user()->gerenteproductos()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuarioproductos->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuarioproductos->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

         if(Auth::user()->gerentemineria()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuariomineria->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuariomineria->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

          if(Auth::user()->gerenteservicios()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuarioservicios->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuarioservicios->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

    
        $pdf=new PDF();
        $pdf=PDF::loadview('admin.usuarios.informe',compact('usuarios'));
         return $pdf->stream('archivo.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
