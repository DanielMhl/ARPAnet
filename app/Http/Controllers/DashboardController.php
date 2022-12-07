<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class DashboardController extends Controller
{
    public function index()
    {
        $vendasDashboard = DB::table('vendas')
        ->join('pessoas', 'vendas.idPessoaComprador', '=', 'pessoas.idPessoa')
        ->join('venda_produtos', 'vendas.idVenda', '=', 'venda_produtos.idVenda')
        ->groupBy(['venda_produtos.idVenda', 'vendas.created_at', 'vendas.valorVenda', 'pessoas.nomePessoa'])
        ->select('vendas.created_at', 'vendas.valorVenda', 'pessoas.nomePessoa', DB::raw('(count(venda_produtos.idProduto)) as qtd_produtos'))
        ->limit(10)
        ->get();

        $totalMes = DB::table('vendas')
        ->where(DB::raw('month(created_at)'), '=', DB::raw('month(current_timestamp())'))
        ->where(DB::raw('year(created_at)'), '=', DB::raw('year(current_timestamp())'))
        ->select(DB::raw('valorVenda'),DB::raw('(sum(valorVenda)) as ttl1'))
        ->first();

        $totalAno = DB::table('vendas')
        ->where(DB::raw('year(created_at)'), '=', DB::raw('year(current_timestamp())'))
        ->select(DB::raw('valorVenda'), DB::raw('(sum(valorVenda)) as ttl2'))
        ->first();

        return view('dashboard.index', compact('totalMes', 'totalAno', 'vendasDashboard'));
    }
}
