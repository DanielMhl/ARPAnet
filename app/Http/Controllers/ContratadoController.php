<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratado;
use App\Models\Pessoa;

class ContratadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $contratados = Contratado::where('idContratado', 'like', '%'.$request->buscaContratado.'%')->orderBy('idContratado','asc')->get();
        $totalContratados = Contratado::all()->count();
        return view('contratados.index', compact('contratados', 'totalContratados'));
    }

    public function pessoa($idPessoa, Request $request)
    {
        $pessoas = Pessoa::find($idPessoa);

        $contratados = Contratado::where('idPessoa',$idPessoa)->where('nomePessoa','like','%'.
        $request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->get(10);

        $totalcontratados = Pessoa::where('idPessoa', $idPessoa)->count();
        return view('funcionarios.index', compact('pessoas', 'totalFuncionarios','departamento'));
    }
    public function create()
    {
        return view('contratados.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Contratado::create($input);

        return redirect()->route('contratados.index')->with('Sucesso', 'Contratado cadastrado com sucesso!');
    }
}
