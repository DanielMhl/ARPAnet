<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;


class VendaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $vendas = Venda::where('idVenda', 'like', '%'.$request->buscaVenda.'%')->orderBy('idVenda','asc')->get();
        $totalVendas = Venda::all()->count();
        return view('vendas.index', compact('vendas', 'totalVendas'));
    }

    public function create()
    {
        return view('vendas.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Venda::create($input);

        return redirect()->route('vendas.index')->with('Sucesso', 'Produto cadastrado com sucesso!');
    }
}
