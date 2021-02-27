<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
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
        $emails= Todo::paginate(5);

        return view('email.inicio', compact('emails'));
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

        //valida datos del email
        $request->validate([
            'asunto' => 'required',
            'destinatario' => 'required|email',
            'mensaje' => 'required',
        ]);

        //Registro de un nuevo email
        $email= Todo::create([
            'subject' => $request->input('asunto'),
            'recipient' => $request->input('destinatario'),
            'message' => $request->input('mensaje'),
        ]);

        return response()->json([ 'success'=> 'Registro Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $emails = Todo::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'emails'  => $emails,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo, $id)
    {
        //verifica que sea administrador
        $request->user()->authorizeRoles(['admin']);

        //valida datos del emails
        $request->validate([
            'editar_asunto' => 'required',
            'editar_destinatario' => 'required|email',
            'editar_mensaje' => 'required',
        ]);

        //actualizar emails
        $emails = Todo::where('id', '=', $id)->first();
        $emails->subject=$request->input('editar_asunto');
        $emails->recipient=$request->input('editar_destinatario');
        $emails->message=$request->input('editar_mensaje');
        $emails->save();

        return response()->json([ 'success'=> 'Registro Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo, Request $request, $id)
    {
        //verifica que sea administrador
        $request->user()->authorizeRoles(['admin']);
        
        // Eliminar usuario
        $emails = Todo::destroy($id);
        return response()->json([ 'success'=> 'Registro Eliminado']);
    }

    //actualizar listado de emails
    public function getemail()
    {
        $emails= Todo::paginate(5);
        $html = view('email.listado', compact('emails'))->render();
        return response()->json(compact('html'));
    } 



}
