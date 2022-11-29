<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $produtos = Produto::where('descricaoProduto', 'like', '%'.$request->buscaProduto.'%')->orderBy('descricaoProduto','asc')->get();
        $totalProdutos = Produto::all()->count();
        return view('produtos.index', compact('produtos', 'totalProdutos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Produto::create($input);

        return redirect()->route('produtos.index')->with('Sucesso', 'Produto cadastrado com sucesso!');
    }
}
