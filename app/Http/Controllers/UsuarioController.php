<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('acessar-usuarios');

        $usuarios = User::where('name', 'like', '%'.$request->buscaUsuario.'%')->orderBy('name','asc')->get();
        $totalUsuarios = User::all()->count();
        return view('usuarios.index', compact('usuarios', 'totalUsuarios'));
    }

    public function create()
    {
        Gate::authorize('acessar-usuarios');
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('acessar-usuarios');
        // dd($request);
        $input = $request->toArray();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }
}
