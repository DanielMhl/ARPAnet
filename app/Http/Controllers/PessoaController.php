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
        // $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->get();
        // $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(10);
         $pessoas = DB::table('pessoas')
         ->join('enderecos', 'enderecos.idPessoa', '=', 'pessoas.idPessoa', 'inner')
         ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(30);
        //  dd($pessoas);
        // $endereco = Pessoa::with('endereco')->findOrFail(20);
        // dd($endereco);
        // ->with('endereco')
        // $idPessoa = $pessoas->toArray();
        // dd($idPessoa);
        // $idPessoas = $idPessoa['idPessoa'];
        // $endereco = Endereco::where('idPessoa', $idPessoas);
        $totalPessoas = Pessoa::all()->count();
        return view('pessoas.index', compact('pessoas', 'totalPessoas'));
    }


    // public function endereco($idPessoa, Request $request)
    // {
    //     $pessoas = Pessoa::find($idPessoa);
    //     $endereco = Endereco::where('idPessoa', $idPessoa)
    //     ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')
    //     ->orderBy('nomePessoa','asc')->get();

    //     $totalPessoas = Pessoa::where('idPessoa', $idPessoa)->count();                          
    //     return view('pessoas.index', compact('pessoas', 'totalPessoas', 'endereco'));
    // }


    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {

      // $endereco = $request->toArray();

        $input = $request->toArray();
        // Pessoa::create($input);
        $idPessoa = Pessoa::create($input);
        $input['idPessoa'] = $idPessoa;
        $input['idPessoa'] = $idPessoa->id;
        //dd($input);
        Endereco::create($input);
        /* COMO RECUPERAR ID DO USUÁRIO APÓS UM CREATE */
            // $idUsuario=User::create($input);
            // dd($idUsuario->id);
        /* COMO RECUPERAR ID DO USUÁRIO APÓS UM CREATE */
        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }
}
