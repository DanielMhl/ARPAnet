<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
       // $idUsuario=User::create($input);
       // dd($idUsuario->id);

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
        $usuario = User::find($id);
        $input = $request->toArray();

        if(!empty($input['foto']) && $input['foto']->isValid())
        {
            Storage::delete('public/usuarios/'.$usuario['foto']);
            $nomeArquivo = $input['foto']->hashName(); // obtém a hash do nome do arquivo
            $input['foto']->store('public/usuarios'); // upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // guardar o nome do arquivo
        }
        if($input['password'] != null){
            $input['password'] = bcrypt($input['password']);
        }else{
            $input['password'] = $usuario['password'];
        }

        $usuario->fill($input);
        $usuario->save();

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário alterado com sucesso!');

    }

    public function update_alt(Request $request, $id)
    {
        // $input = $request->getFieldValues();
        // dd($input);
        // $request->except(["password"]);
        // dd($request);
        $input = $request->toArray();
        // dd($input);
        // $input = $request->toArray();
        $usuario = User::find($id);
        if(!empty($input['foto']) && $input['foto']->isValid())
        {
            Storage::delete('public/usuarios/'.$usuario['foto']);
            $nomeArquivo = $input['foto']->hashName(); // obtém a hash do nome do arquivo
            $input['foto']->store('public/usuarios'); // upload da foto em uma pasta
            $input['foto'] = $nomeArquivo; // guardar o nome do arquivo
        }
        // if ( !empty($input['password']) && isset($input['password'])) // verifica se a senha foi alterada
        //     {
        //         $input['password'] = bcrypt($input['password']); // muda a senha do seu usuario já criptografada pela função bcrypt
        //         $usuario->fill($input);
        //         $usuario->save();
        //     } else {
        //         $usuario->fill($input);
        //         $usuario->except(['password']);
        //         $usuario->save();
        //     }
                $usuario->fill($input);
                $usuario->save();

        return redirect()->route('usuarios.alt', compact('id'))->with('sucesso', 'Cadastro alterado com sucesso!');

    }

    public function modifypass($id,Request $request )
    {
        $input = $request->toArray();
        // ->all();

        $usuario = User::find($id);

        if (! Hash::check($input['password_old'], Auth::user()->password)) {
            return redirect()
            ->route('usuarios.modifypass')
            ->withErrors(['password_old' => 'Senha atual está incorreta'])
            ->withInput();
        }
        $validar = Validator::make(
            $request->all(),[
                'password' => ["required"],
                'password_check' => 'required|same:password']
            );
        if ($validar->fails()) {
            return redirect()
            ->route('usuarios.modifypass')
            ->withErrors($validar)
            ->withInput();
        }

        $input['password'] = bcrypt($input['password']);
        // $usuario->update($input);
        $usuario->fill($input);
        // dd($usuario);
        $usuario->save();

        return redirect()->route('usuarios.alt', compact('id'))->with('sucesso', 'Senha alterada com sucesso!');
    }


}
