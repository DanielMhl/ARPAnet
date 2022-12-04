<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\VendaProduto;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {   
        /*03/12/2022*/
        /*$vendas = Venda::where('idVenda', 'like', '%'.$request->buscaVenda.'%')->orderBy('idVenda','asc')->get();*/
        $vendas = DB::table('vendas')
        ->join('pessoas', 'vendas.idPessoaComprador', '=', 'pessoas.idPessoa')
        ->select('vendas.*', 'pessoas.nomePessoa', DB::raw('(CASE vendas.formaPagamentoVenda WHEN "DI" THEN "Dinheiro" WHEN "CR" THEN "Cartão de Crédito" END) AS descFormaPagamento'))
        ->get();
        $totalVendas = Venda::all()->count();
        return view('vendas.index', compact('vendas', 'totalVendas'));
    }

    public function create()
    {
        /*03/12/2022*/
        /*return view('vendas.create');*/
        $produtos = Produto::all();
        $compradores = Pessoa::all();
        return view('vendas.create', compact('produtos', 'compradores'));
    }

    public function store(Request $request)
    {   /*03/12/2022*/
        $inputVenda = $request->toArray();
        $inputVendaProduto = array();
        $arrayProduto = $inputVenda["produto"];
        $arrayQtd = $inputVenda["quantidade"];
        
        $idVenda = Venda::create($inputVenda);

        for ($i=0; $i < count($arrayProduto); $i++) {
            $inputVendaProduto = ["pesoVenda" => $arrayQtd[$i], "idVenda" => $idVenda->id, "idProduto" => $arrayProduto[$i]];

            VendaProduto::create($inputVendaProduto);

            $tblProduto = Produto::where('idProduto', '=', $arrayProduto[$i])->get();
            $novaQtdProd = $tblProduto[0]->quantidadeProduto - $arrayQtd[$i];

            DB::update(
               'update produtos set quantidadeProduto = '.DB::raw('cast('.$novaQtdProd.' as float)').'where idProduto = ?',
               [$arrayProduto[$i]]
            );
        }

        return redirect()->route('vendas.index')->with('Sucesso', 'Produto cadastrado com sucesso!');
    }
}
