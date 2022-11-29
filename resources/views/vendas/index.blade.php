@extends('layouts.default')

@section('title', 'Vendas')

@section('conteudo')
    <h1 class="mb-4">Vendas</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <a href="{{ route('vendas.create') }}" class="btn btn-primary float-end mb-2 rounded-circle" title="Nova Venda"><i class="bi bi-plus fs-4"></i></a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Forma de Pagamento</th>
                <th>Descrição do Produto</th>
                <th>Quantidade (Kg)</th>
                <th>Comprador</th>
                <th>Valor</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr>
                <td class="align-middle text-center">{{ $venda->idVenda }}</td>
                <td class="align-middle text-center">{{ $venda->descricaoProduto }}</td>
                <td class="align-middle text-center">{{ $venda->formaPagamentoVenda }}</td>
                <td class="align-middle text-center">{{ $venda->idComprador }}</td>
                <td class="align-middle text-center">{{ $venda->valorVenda }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $venda->id }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="{{ $venda->id }}" class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

