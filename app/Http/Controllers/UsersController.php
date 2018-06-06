<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\tipoUsuario;
use App\region;
use Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{

    public function index()
    {   
        /*Obtenemos id de tipo de usuario*/
        $usuariomaquinaria= tipoUsuario::find(1)->where('descripcion','usuariomaquinaria')->first();
        $usuariomineria= tipoUsuario::find(1)->where('descripcion','usuariomineria')->first();
        $usuarioproductos= tipoUsuario::find(1)->where('descripcion','usuarioproductos')->first();
        $usuarioservicios= tipoUsuario::find(1)->where('descripcion','usuarioservicios')->first();


        $region=Auth::user()->obtenerregion();
       
        $usuarios=User::where('user_id', Auth::user()->obtenerId())->paginate(4);
        /*Muestra clientes no asignados segun su region y su rol en el negocio*/
        if(Auth::user()->empleadomaquinaria()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuariomaquinaria->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuariomaquinaria->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

        if(Auth::user()->empleadoproductos()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuarioproductos->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuarioproductos->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

         if(Auth::user()->empleadomineria()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuariomineria->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuariomineria->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

          if(Auth::user()->empleadoservicios()){
        $usuarios=User::where('user_id', null)
                        ->Where('region_id', $region)
                        ->Where('tipoUsuario_id', $usuarioservicios->id)
                        ->orWhere('user_id', Auth::user()->obtenerId())
                        ->Where('tipoUsuario_id', $usuarioservicios->id)
                        ->Where('region_id', $region)
                        ->paginate(4); 
        }

        /*Notificación de usuarios sin empleado asignado*/
        $contador=0;
        foreach($usuarios as $user){
                if(!($user->user_id)){
                    $contador=$contador+1;
                }
            }
        if($contador>0){
        flash('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Existen '. $contador .  ' usuarios sin asignar')->error()->important();}

        return view('admin.usuarios.index', compact ('usuarios'));
    }

  
    public function create()
    {
         $regiones=region::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        if(Auth::user()){
        return view('admin.usuarios.create', compact('regiones'));
        }
        else{
            return view('admin.usuarios.createuser', compact('regiones'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $tipoUsuario= tipoUsuario::find(1)->where('descripcion',$request->tipoUsuario_id)->first();
        
        $usuario=new User($request->all());
        $usuario->password=bcrypt($request->password);
        $usuario->tipoUsuario_id=$tipoUsuario->id;
        
        if(Auth::user()){
        $usuario->user_id=Auth::user()->obtenerId();
        }
           
        $usuario->save();

        flash("Se ha registrado ". $usuario->name . " de forma exitosa")->success()->important();

        /*Redireccionamiento si es usuario registrado*/
        if(Auth::user()){
        return redirect()->route('admin.usuarios.index');}
        else{
        return redirect()->route('admin.auth.login');
        }
        
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
        $tipo=tipoUsuario::orderby('id','ASC')->lists('descripcion', 'descripcion');
        $user= User::find($id);
        return view('admin.usuarios.edit', compact('user', 'tipo'));
    }

    public function assign($id)
    {
        $empleadomaquinaria= tipoUsuario::find(1)->where('descripcion','empleadomaquinaria')->first();
        $region=Auth::user()->obtenerregion();
        
        $empleados= User::where('tipoUsuario_id', Auth::user()->obtenerTipoUsuario_id())
                        ->Where('region_id', $region)
                        ->lists('name', 'id');
        $tipo=tipoUsuario::orderby('id','ASC')->lists('descripcion', 'descripcion');
        $regiones=region::select('id', 'descripcion')->orderby('id','ASC')->lists('descripcion','id');
        $user= User::find($id);

        
        return view('admin.usuarios.assign', compact('user', 'tipo', 'regiones', 'empleados'));
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
        $tipoUsuario= tipoUsuario::find(1)->where('descripcion',$request->tipoUsuario_id)->first();
        $region= region::find(1)->where('descripcion',$request->region_id)->first();

        $usuario=user::Find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->tipoUsuario_id=$tipoUsuario->id;
        $usuario->region_id=$region->id;
        if(!empty($request->password))
        {
            $usuario->password=bcrypt($request->password);
        }

        $usuario->save();

        flash('El usuario '. $usuario->name . ' ha sido editado con exito!')->warning()->important();
        return redirect()->route('admin.usuarios.index');
    }

    public function updateassing(Request $request, $id)
    {
        $tipoUsuario= tipoUsuario::find(1)->where('descripcion',$request->tipoUsuario_id)->first();
        $region= region::find(1)->where('descripcion',$request->region_id)->first();

        $usuario=user::Find($id);

        $usuario->user_id=$request->empleado_id;
        
        $usuario->save();

        flash('El usuario '. $usuario->name . ' ha sido asignado con exito!')->warning()->important();
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario= User::find($id);
        $usuario->delete();

        flash('El usuario ' . $usuario->name . ' a sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.usuarios.index');
    }
}
