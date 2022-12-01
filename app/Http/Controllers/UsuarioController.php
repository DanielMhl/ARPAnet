<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        if(!empty($input['foto'] && $input['foto']->isValid())) {
            $nomeArquivo = $input['foto']->hashName(); // obtém a hash do nome do arquivo
            $input['foto']->store('public/usuarios'); // upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // guardar o nome do arquivo
        } else {
            $input['foto'] = null;
         }
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        Storage::delete('public/usuarios/'.$usuario['foto']);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário deletado com sucesso!');
    }

    public function edit($id)
    {
        $usuario = User::find($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function alt($id)
    {
        $usuario = User::find($id);

        return view('usuarios.alt', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->toArray();
        $funcionario = User::find($id);

        if(!empty($input['foto']) && $input['foto']->isValid())
        {
            Storage::delete('public/usuarios/'.$funcionario['foto']);
            $nomeArquivo = $input['foto']->hashName(); // obtém a hash do nome do arquivo
            $input['foto']->store('public/usuarios'); // upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // guardar o nome do arquivo
        }

        $funcionario->fill($input);
        $funcionario->save();

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário alterado com sucesso!');

    }

}
