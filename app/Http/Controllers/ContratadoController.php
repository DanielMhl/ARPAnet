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
        $pessoas = Pessoa::all();
        $contratados = Contratado::where('idContratado', 'like', '%'.$request->buscaContratado.'%')->orderBy('idContratado','asc')->get();
        $totalContratados = Contratado::all()->count();
        return view('contratados.index', compact('contratados', 'totalContratados'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        $contratados = Contratado::all();
        return view('contratados.create', compact('contratados', 'pessoas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Contratado::create($input);

        return redirect()->route('contratados.index')->with('Sucesso', 'Contratado cadastrado com sucesso!');
    }
}
