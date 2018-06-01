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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuariomineria= tipoUsuario::find(1)->where('descripcion','usuariomineria')->first();
        $usuarioproductos= tipoUsuario::find(1)->where('descripcion','usuarioproductos')->first();
        $usuariomaquinaria= tipoUsuario::find(1)->where('descripcion','usuariomaquinaria')->first();
         $empleadomineria= tipoUsuario::find(1)->where('descripcion','empleadomineria')->first();
         $empleadoproductos= tipoUsuario::find(1)->where('descripcion','empleadoproductos')->first();
        $empleadomaquinaria= tipoUsuario::find(1)->where('descripcion','empleadomaquinaria')->first();

        $region=Auth::user()->obtenerregion();
        

        if (Auth::user()->gerentemineria())
        {
        $usuarios= user::where('tipoUsuario_id', $usuariomineria->id)
                        ->Where('region_id', $region)
                        ->orWhere('tipoUsuario_id', $empleadomineria->id)
                        ->Where('region_id', $region)
                        ->orderBy('id', 'ASC')->paginate(4);       
        }
        else if(Auth::user()->gerenteproductos()){
            $usuarios= user::where('tipoUsuario_id', $usuarioproductos->id)
                            ->Where('region_id', $region)
                            ->orWhere('tipoUsuario_id', $empleadoproductos->id)
                            ->Where('region_id', $region)
                            ->orderBy('id', 'ASC')->paginate(4);      
        }
        else if(Auth::user()->gerentemaquinaria()){
            $usuarios= user::where('tipoUsuario_id', $usuariomaquinaria->id)
                            ->Where('region_id', $region)
                            ->orWhere('tipoUsuario_id', $empleadomaquinaria->id)
                            ->Where('region_id', $region)
                            ->orderBy('id', 'ASC')->paginate(4);     
        }
        else {
            $usuarios= user::orderBy('id', 'ASC')->paginate(4); 
        }
        return view('admin.usuarios.index', compact ('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
           
        $usuario->save();

        flash("Se ha registrado ". $usuario->name . " de forma exitosa")->success()->important();
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
