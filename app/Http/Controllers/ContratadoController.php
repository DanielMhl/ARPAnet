<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratado;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;
class ContratadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $pessoas = Pessoa::all();
        
        $contratados = DB::table('contratados')
        ->join('pessoas', 'pessoas.idPessoa', '=', 'contratados.idPessoa')
        ->where('idContratado', 'like', '%'.$request->buscaContratado.'%')->orderBy('idContratado','asc')->get();
       
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

    public function destroy($idContratado)
    {
        $contratados = Contratado::find($idContratado);
        $contratados->delete();

        return redirect()->route('contratados.index')->with('Sucesso', 'Contratado deletado com sucesso!');
    }

    public function edit($idContratado)
    {
        $contratados = Contratado::find($idContratado);
        return view('contratados.edit', compact('contratados'));
    }

    public function update(Request $request, $idContratado)
    {
        $input = $request->toArray();
        $contratados = Contratado::find($idContratado);

        $contratados->fill($input);
        $contratados->save();

        return redirect()->route('contratados.index')->with('Sucesso', 'Contratado alterado com sucesso!');

    }
}
