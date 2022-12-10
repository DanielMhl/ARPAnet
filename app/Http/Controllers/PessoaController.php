<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        // $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(10);
        $pessoas = DB::table('pessoas')
        ->join('enderecos', 'enderecos.idPessoa', '=', 'pessoas.idPessoa', 'inner')
        ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(30);

        $totalPessoas = Pessoa::all()->count();
        return view('pessoas.index', compact('pessoas', 'totalPessoas'));
    }

    public function create()
    {
        $UFs = DB::table('uf')->get();
        return view('pessoas.create', compact('UFs'));
    }


    public function store(Request $request)
    {
        $input = $request->toArray();

        $input = str_replace(".","", $input);
        $input = str_replace("-","", $input);
        $input = str_replace("/","", $input);

        $idPessoa = Pessoa::create($input);

        $input['idPessoa'] = $idPessoa;
        $input['idPessoa'] = $idPessoa->idPessoa;

        Endereco::create($input);

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }

    public function destroy($idPessoa)
    {   
        $idAssociado = DB::table('associados')->select('idAssociado')->where('idPessoa', '=', $idPessoa)->first();
        $idContratado = DB::table('contratados')->select('idContratado')->where('idPessoa', '=', $idPessoa)->first();

        if (!empty($idAssociado) || !empty($idContratado)) {
            return redirect()->route('pessoas.index')->
            with('Erro', 'Antes de excluir a pessoa, é necessário excluir o seu cadastro de '.(!empty($idAssociado)?'associado':'contratado').'.');
        }

        $idEndereco = DB::table('enderecos')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $enderecos = Endereco::find($idEndereco->idEndereco);
        $enderecos->delete();

        $pessoas = Pessoa::find($idPessoa);
        $pessoas->delete();

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa deletada com sucesso!');
    }

    public function edit($idPessoa)
    {
        $pessoas = Pessoa::find($idPessoa);
        $idEndereco = DB::table('enderecos')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $enderecos = Endereco::find($idEndereco->idEndereco);
        $UFs = DB::table('uf')->get();
        return view('pessoas.edit', compact('pessoas', 'enderecos', 'UFs'));
    }

    public function update(Request $request, $idPessoa)
    {
        $input = $request->toArray();
        $pessoas = Pessoa::find($idPessoa);

        $pessoas->fill($input);
        $pessoas->save();

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa alterada com sucesso!');

    }
}
