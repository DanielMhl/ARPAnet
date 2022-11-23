<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // Gate::authorize('acessar-usuarios');

        $usuarios = User::all()->sortBy('name');
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        // Gate::authorize('acessar-usuarios');
        return view('usuarios.create');
    }
    
    public function store(Request $request)
    {
        // Gate::authorize('acessar-usuarios');
        // dd($request);
        $input = $request->toArray();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }
}
