<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;

class PessoaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        // $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->get();
        $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(10);

        $totalPessoas = Pessoa::all()->count();
        return view('pessoas.index', compact('pessoas', 'totalPessoas'));
    }

    public function create()
    {
        return view('pessoas.create');
    }


    public function store(Request $request)
    {

      // $endereco = $request->toArray();

        $input = $request->toArray();
        //Pessoa::create($input);
        $input = str_replace(".","", $input);
        $input = str_replace("-","", $input);
        $input = str_replace("/","", $input);

        $idPessoa = Pessoa::create($input);
        $input['idPessoa'] = $idPessoa;
        $input['idPessoa'] = $idPessoa->id;
        // dd($input);
        Endereco::create($input);
        /* COMO RECUPERAR ID DO USUÁRIO APÓS UM CREATE */
            // $idUsuario=User::create($input);
            // dd($idUsuario->id);
        /* COMO RECUPERAR ID DO USUÁRIO APÓS UM CREATE */
        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }
}
