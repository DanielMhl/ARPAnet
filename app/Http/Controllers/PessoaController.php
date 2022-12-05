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
        $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->get();
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
        Pessoa::create($input);
        $idPessoa=Endereco::create($input);

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }
}
