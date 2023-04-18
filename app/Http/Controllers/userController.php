<?php
//controlador API preestablecido
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user; // agregando ruta del modelo user para poder acceder a la bd

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return user::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new user;
        $user->id= $request->id;
        $user->nombre= $request->nombre;
        $user->apellidos= $request->apellidos;
        $user->edad= $request->edad;
        $user->salario= $request->salario;
        $user->created_at= $request->created_at;
        $result= $user->save(); //ingresando datos en la bd
        if ($result) {
            return "La data ha sido ingresada con exito";
        } else {
            return "fail";
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)//string $id)
    {
        return $user;
        //$usuario =user::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string  $id)
    {
        $usuario =user::find($id);
        $usuario->nombre=$request->nombre;
        $usuario->apellidos=$request->apellidos;
        $usuario->edad=$request->edad;
        $usuario->salario=$request->salario;
        $result=$usuario->save(); //metodo para executar el request
        if ($result) {
            return "La data ha sido modificada con exito";
        } else {
            return "fail";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario= user::find($id);
        $result=$usuario->delete();  //metodo para executar el request
        if ($result) {
            return "La data ha sido eliminada con exito";
        } else {
            return "fail";
        }

    }

}