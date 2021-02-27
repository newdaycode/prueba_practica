<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['admin','user']);
        $usuario= User::usuarios()->where('users.id', '=', $request->user()->id)->first();
        return view('home', compact('usuario','request'));
    }
}
