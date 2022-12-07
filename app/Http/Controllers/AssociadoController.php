<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AssociadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $associados = DB::table('associados')
        ->join('pessoas', 'pessoas.idPessoa', '=', 'associados.idPessoa')
        ->where('idAssociado', 'like', '%'.$request->buscaAssociado.'%')->orderBy('idAssociado','asc')->get();

        $totalAssociados= Associado::all()->count();
        return view('associados.index', compact('associados', 'totalAssociados'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        $associados = Associado::all();
        return view('associados.create', compact('associados', 'pessoas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Associado::create($input);

        return redirect()->route('associados.index')->with('Sucesso', 'Associado cadastrado com sucesso!');
    }

    public function destroy($idAssociado)
    {
        $associados = Associado::find($idAssociado);
        $associados->delete();

        return redirect()->route('associados.index')->with('Sucesso', 'Associado deletado com sucesso!');
    }

    public function edit($idAssociado)
    {
        $associados = Associado::find($idAssociado);
        return view('associados.edit', compact('associados'));
    }

    public function update(Request $request, $idAssociado)
    {
        $input = $request->toArray();
        $associados = Associado::find($idAssociado);

        $associados->fill($input);
        $associados->save();

        return redirect()->route('associados.index')->with('Sucesso', 'Associado alterado com sucesso!');

    }
}
