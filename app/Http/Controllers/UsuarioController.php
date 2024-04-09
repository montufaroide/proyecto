<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Lst_Usuarios']=Usuario::paginate(5);
       
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosUsuario=request()->all();
        $datosUsuario=request()->except('_token');
        
         if($request->hasFile('Foto')){
             $datosUsuario['Foto']=$request->file('Foto')->store('uploads','public');
         }

        Usuario::insert($datosUsuario);



        
       // return response()->json($datosUsuario);
       return redirect('usuarios')->with('Mensaje','Empleado agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario= Usuario::findOrFail($id);
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuario=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $usuario= Usuario::findOrFail($id);

            Storage::delete('public/'.$usuario->foto);
            
            $datosUsuario['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Usuario::where('id','=',$id)->update($datosUsuario);

        // $usuario= Usuario::findOrFail($id);
        // return view('usuarios.edit',compact('usuario'));
       return redirect('usuarios')->with('Mensaje','Empleado modificado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario= Usuario::findOrFail($id);
        
        if(Storage::delete('public/'.$usuario->foto)){
            Usuario::destroy($id);
        }

        
        return redirect('usuarios')->with('Mensaje','Empleado eliminado con éxito.');

    }
}
