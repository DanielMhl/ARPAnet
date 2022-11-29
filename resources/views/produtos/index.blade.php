@extends('layouts.default')

@section('title', 'Produtos')

@section('conteudo')

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="mb-4">Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Produtos: {{ $totalProdutos }}</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaProduto" class="form-control form-control-lg" placeholder="Nome do Produto">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <a href="{{ route('produtos.index') }}" class="btn btn-light border btn-lg">Limpar</a>
</form>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Descrição</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td class="align-middle text-center">{{ $produto->idProduto }}</td>
                <td class="align-middle text-center">{{ $produto->descricaoProduto }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $produto->id }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="{{ $produto->id }}" class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

