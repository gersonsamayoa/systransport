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
use App\estadoTransaccion;
use App\user;
use Auth;

class TransaccionController extends Controller
{

    public function index()
    {
        if(Auth::user()->gerentegeneral()){
           $transacciones= transaccion::orderBy('id', 'ASC')
                                ->where('estadoTransaccion_id',2)
                                ->paginate(4);
            $sum = transaccion::where('estadoTransaccion_id',2)->sum('total');
            
         return view('admin.transaccion.index', compact('transacciones','sum'));    
                            }
     

        if(!(Auth::user()->user_id))
        {
        flash('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Lo sentimos :-( aun no puedes realizar ninguna transacción, espera un poco mas...')->error()->important();
        return view('index');
        }
        /*Obtenemos todos los usuarios a su cargo*/
        $trans=Auth::user()->parents()->select('id')->get();
        /*Lo convertimos en array*/
        $plucked=$trans->pluck('id');

        $transacciones= transaccion::orderBy('id', 'ASC')
                                ->WhereIn('user_id', $plucked)
                                ->orWhere('user_id', Auth::user()->id)
                                ->paginate(4);
        if(Auth::user()->gerentemaquinaria()){
            $trans=user::where('region_id', Auth::user()->region_id)
                        ->select('id')->get();
            $plucked=$trans->pluck('id');
            $transacciones= transaccion::orderBy('id', 'ASC')
                                ->WhereIn('user_id', $plucked)
                                ->orWhere('user_id', Auth::user()->id)
                                ->paginate(4);
        }
 /*Noficacion de Compras Alquileres sin autorizar*/
        $contador=0;
        foreach($transacciones as $transaccion){
                if($transaccion->estadoTransaccion->descripcion!="Finalizada"){
                    $contador++;
                }
            }
        if($contador>0){
        flash('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Existen '. $contador .  ' transacciones Pendientes')->error()->important();}
                                    
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
                                    ->where('region_id',$usuario->region_id)
                                    ->whereIn('estadoEquipo_id', [1,3])
                                    ->get();
             return view('admin.transaccion.listmaquinarias', compact('tipoTransacciones', 'maquinarias'));
    }

    public function store(Request $request)
    {
        if($request->tipoTransaccion_id==1){
        $transaccion=new transaccion();
        $transaccion->fecha=$request->fecha;
        $transaccion->cantidadDias=0;

        $maquinaria= maquinaria::find($request->maquinaria_id);
        $maquinaria->estadoEquipo_id=4;
        $maquinaria->save();

        $transaccion->total=$maquinaria->precio;

        $transaccion->user_id=Auth::user()->obtenerId();
        $transaccion->tipoTransaccion_id=$request->tipoTransaccion_id;
        $transaccion->maquinaria_id=$request->maquinaria_id;
        $transaccion->estadoTransaccion_id=1;
        $transaccion->save();
        

        flash("Se ha registrado tu compra de la maquinaria: ". $maquinaria->placa . " de forma exitosa, espera confirmación")->success()->important();

        return redirect()->route('admin.transaccion.index');
        }
        else
        {
            $transaccion=new transaccion();
            $transaccion->fecha=$request->fecha;
            $transaccion->cantidadDias=$request->cantidadDias;

            $maquinaria= maquinaria::find($request->maquinaria_id);
            $maquinaria->estadoEquipo_id=2;
            $maquinaria->save();

            $transaccion->total=$maquinaria->costoPorDia*$request->cantidadDias;
            
            $transaccion->user_id=Auth::user()->obtenerId();
            $transaccion->tipoTransaccion_id=$request->tipoTransaccion_id;
            $transaccion->maquinaria_id=$request->maquinaria_id;
            $transaccion->estadoTransaccion_id=1;
            $transaccion->save();
            

            flash("Se ha registrado tu Alquiler de la maquinaria: ". $maquinaria->placa . " de forma exitosa, espera confirmación")->success()->important();

            return redirect()->route('admin.transaccion.index');
        }
    }

     public function show($id)
    {
      
    }

    public function comprar($id, $tipo)
    {
        $usuario=Auth::user()->obtenerId();
        $tipoTransaccion=tipoTransaccion::where('descripcion',$tipo)->select('id')->first();

        $maquinaria= maquinaria::find($id);
        return view('admin.transaccion.comprar', compact('maquinaria','usuario', 'tipoTransaccion'));
    }

     public function alquilar($id, $tipo)
    {
        $usuario=Auth::user()->obtenerId();
        $tipoTransaccion=tipoTransaccion::where('descripcion',$tipo)->select('id')->first();

        $maquinaria= maquinaria::find($id);
        return view('admin.transaccion.alquilar', compact('maquinaria','usuario', 'tipoTransaccion'));
    }

    public function edit($id)
    {
        $usuario=Auth::user()->obtenerId();
        $transaccion= transaccion::find($id);
       $estadoTransaccion=estadoTransaccion::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
       
        $maquinaria=maquinaria::find($transaccion->maquinaria_id);
        return view('admin.transaccion.validar', compact('usuario', 'transaccion', 'maquinaria', 'estadoTransaccion'));
    }


    public function update(Request $request, $id)
    {
         if($request->tipoTransaccion_id==1){
        $transaccion=transaccion::Find($id);
        $transaccion->estadoTransaccion_id=$request->estadoTransaccion;
         $transaccion->save();

      flash('La transaccion de '. $transaccion->user->name . ' ha sido autorizada con éxito')->warning()->important();
      return redirect()->route('admin.transaccion.index');}
      else
      {
        $transaccion=transaccion::Find($id);
        $transaccion->estadoTransaccion_id=$request->estadoTransaccion;
            if($request->estadoTransaccion==2){
                $maquinaria=maquinaria::find($transaccion->maquinaria_id);
                $maquinaria->estadoEquipo_id=3;
                $maquinaria->save();
            }
         $transaccion->save();
          flash('La transaccion de '. $transaccion->user->name . ' ha sido autorizada con éxito')->warning()->important();
      return redirect()->route('admin.transaccion.index');
      
      }
    }


    public function destroy($id)
    {

        $transaccion= transaccion::find($id);

        if($transaccion->tipoTransaccion_id==2){
        $maquinaria=maquinaria::find($transaccion->maquinaria_id);
                $maquinaria->estadoEquipo_id=3;
                $maquinaria->save();}
                
        if($transaccion->tipoTransaccion_id==1){
        $maquinaria=maquinaria::find($transaccion->maquinaria_id);
                $maquinaria->estadoEquipo_id=1;
                $maquinaria->save();}

        $transaccion->delete();

        flash('La transaccion ' . $transaccion->id . ' a sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.transaccion.index');
    }
}
