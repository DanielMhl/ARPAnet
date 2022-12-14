@extends('layouts.default')

@section('title', 'Vendas')

@section('conteudo')

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <a href="{{ route('vendas.create') }}" class="btn btn-primary float-end mb-2 rounded-circle" title="Nova Venda"><i class="bi bi-plus fs-4"></i></a>
    <h1 class="mb-4">Vendas</h1>
    <a href="{{ route('vendas.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Vendas: {{ $totalVendas}}</p>
    <form action="" method="get" class="mb-3 d-flex justify-content-end">
        <div class="input-group me-3">
            <input type="text" name="buscaVenda" class="form-control form-control-lg" placeholder="Nome do Produto">
            <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
        </div>
        <a href="{{ route('vendas.index') }}" class="btn btn-light border btn-lg">Limpar</a>
    </form>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Forma de Pagamento</th>
                <th>Comprador</th>
                <th>Data da Venda</th>
                <th>Valor</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr>
                <td class="align-middle text-center">{{ $venda->idVenda }}</td>
                <td class="align-middle text-center">{{ $venda->descFormaPagamento }}</td>
                <td class="align-middle text-center">{{ $venda->nomePessoa }}</td>
                <td class="align-middle text-center">{{ $venda->created_at }}</td>
                <td class="align-middle text-center">{{ $venda->valorVenda }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $venda->idVenda }}" class="btn btn-primary" title="Editar"><i class="bi bi-search"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection