<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Countries;
use App\States;
use App\Cities;
use App\Role;
use Validator;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //verifica que sea administrador
        $request->user()->authorizeRoles(['admin']);
        //usuarios y limites de pagina
        $usuarios= User::usuarios()->paginate(5);

        //listado de paises
        $paises = Countries::get();
        return view('usuario.inicio', compact('usuarios', 'paises'));
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

        //verifica que sea administrador
        $request->user()->authorizeRoles(['admin']);

        //valida datos del usuario
        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'clave' => ['required','string','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/',
            ],
            'telefono' => 'required|max:11',
            'identification' => 'required|unique:users|integer|min:11',
            'ciudad' => 'required|integer',
            'fecha' => 'required|date',
        ]);

        //Registro de un nuevo usuario
        $user= User::create([
            'names' => $request->input('nombres'),
            'last_names' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'phone' => $request->input('telefono'),
            'password' => Hash::make($request->input('clave')),
            'identification' => $request->input('identification'),
            'date_of_birth' => $request->input('fecha'),
            'cities_id' => $request->input('ciudad'),
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());
        return response()->json([ 'success'=> 'Registro Exitoso']);

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

    //cargar los estados de acuerdo a los paises
    public function getestados($id)
    {

        $estados = States::
            where('countries_id', '=', $id)
            ->get();

        return response()->json(compact('estados'));
    }     

    //cargar las ciudades de acuerdo a los estados
    public function getciudad($id)
    {

        $ciudades = Cities::
            where('states_id', '=', $id)
            ->get();

        return response()->json(compact('ciudades'));
    }  

    //actualizar listado de usuarios
    public function getusuario()
    {
        //usuarios y limites de pagina
        $usuarios= User::usuarios()->paginate(5);

        $html = view('usuario.listado', compact('usuarios'))->render();
        return response()->json(compact('html'));
    }  

}
